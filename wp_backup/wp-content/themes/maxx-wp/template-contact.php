<?php
/*
 *Template Name: Contact
 *
 * @package WordPress
 * @subpackage Maxx
 */
?>

<?php get_header(); ?>

<?php 

$nameError = '';
$emailError = '';
$commentError = '';

//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError =  __('You forgot to enter your name.', 'framework'); 
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = __('You forgot to enter your email address.', 'framework');
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = __('You entered an invalid email address.', 'framework');
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = __('You forgot to enter your comments.', 'framework');
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {
			
			$emailTo = $data['md_contact_form_email'];
			$subject = __('Contact Form Submission from ', 'framework').$name;
			$body = __("Name: $name \n\nEmail: $email \n\nComments: $comments", 'framework');
			$headers = __( 'From: ', 'framework') . "$name <$email>" . "\r\n" . __( 'Reply-To: ', 'framework' ) . $email;


			wp_mail($emailTo, $subject, $body, $headers);
			$emailSent = true;

		}
	}
} ?>




<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery(document).ready(function() {
	jQuery('form#contact-form').submit(function() {
		jQuery('form#contact-form .error').remove();
		var hasError = false;
		jQuery('.requiredField').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				var labelText = jQuery(this).prev().prev('label').text();
				jQuery(this).parent().append('<div class="clear"></div><span class="error"><?php _e('You forgot to enter your', 'framework'); ?> '+labelText+'.</span>');
				jQuery(this).addClass('inputError');
				hasError = true;
			} else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					var labelText = jQuery(this).prev().prev('label').text();
					jQuery(this).parent().append('<div class="clear"></div><span class="error"><?php _e('You entered an invalid', 'framework'); ?> '+labelText+'.</span>');
					jQuery(this).addClass('inputError');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			var formInput = jQuery(this).serialize();
			jQuery.post(jQuery(this).attr('action'),formInput, function(data){
				jQuery('form#contact-form').slideUp("fast", function() {				   
					jQuery(this).before('<div class="md-notification green"><?php _e('Your email was successfully sent.', 'framework');  ?></div>');
				});
			});
		}
		
		return false;
		
	});
});
//-->!]]>
</script>

    <!--main content-->
    <div id="main-content-wrapper" class="fixed-width-wrapper" >
    	
        <!--breadcrums-->
		<?php if ($data['md_show_breadcrums'] && class_exists('simple_breadcrumb')){?>
        <div id="breadcrumb-wrapper" class="float-left">
        	<?php $breadcrumbs = new simple_breadcrumb; ?>
        </div>
        <?php }?>
        <!--/breadcrums-->
        
 
        <!--Page title-->
        <h1 class="page-title cufon first-word double-color"><?php the_title(); ?></h1>
        <!--/Page title-->

    	

		<!--content-->
        <div id="content" class="fullwidth-page">
        
		
            
        	<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
			<!--post entry-->
            <article <?php post_class('post-entry') ?> id="post-<?php the_ID(); ?>">
                <!--entry content-->
                <div class="entry-content">
					<?php the_content();?>
                </div>
                <!--/entry content-->
            </article>
            <!--/post entry-->
        
            <div class="sp"></div>
            
            
            <div class="two-third first">
            <?php if(isset($hasError) || isset($captchaError) ) { ?>
                <?php echo do_shortcode('[notification style="red"]'.__('There was an error submitting the form.', 'framework').'[/notification]');  ?>
            <?php } ?>
            
            <?php if ($data['md_contact_form_email'] == '' ) { ?>
                <?php echo do_shortcode('[notification style="yellow"]'.__('E-mail has not been setup properly. Please add your contact e-mail!', 'framework').'[/notification]');  ?>
            <?php } ?>
            
            <?php if(isset($emailSent) && $emailSent == true) { ?>
        
            <p><?php _e('Your email was <strong>successfully</strong> sent.','framework')?></p>
        
        	<?php } else { ?>
            <h3 class="first-word"><?php _e('Contact form:','framework')?></h3>
            <em><?php _e('Required fields are marked *','framework')?></em><br><br>
            <form action="<?php the_permalink(); ?>" id="contact-form" method="post">
                
                    
                        <p><label for="contactName"><?php _e('Name', 'framework'); ?></label><span class="required">*</span>
                            <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="txt requiredField" />
                            <?php if($nameError != '') { ?>
                                <span class="error"><?php echo $nameError;?></span> 
                            <?php } ?>
                        </p>
                        
                        <p><label for="email"><?php _e('Email', 'framework'); ?></label><span class="required">*</span>
                            <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="txt requiredField email" />
                            <?php if($emailError != '') { ?>
                                <span class="error"><?php echo $emailError;?></span>
                            <?php } ?>
                        </p>
                        
                        <p><label for="commentsText"><?php _e('Message', 'framework'); ?></label><span class="required">*</span>
                            <textarea name="comments" id="commentsText" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea><br>
                            <?php if($commentError != '') { ?>
                                <span class="error"><?php echo $commentError;?></span> 
                            <?php } ?>
                        </p>
                        
                        <p style="display:none"><label for="checking" class="screenReader"><?php _e('If you want to submit this form, do not enter anything in this field', 'framework') ?></label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></p>
                        <p><input type="hidden" name="submitted" id="submitted" value="true" /><input class="submit button" type="submit" value="<?php _e('Send Message', 'framework'); ?>" /></p>
                    
                </form>
            <?php } ?>
            </div>
            
            
            <?php if(has_post_thumbnail()){?>
            <!--featured image-->
            <div class="one-third">
            	<div class="border-frame">
                	<?php the_post_thumbnail();?>
                </div>
            </div>
            <?php }?>
            
            <?php endwhile; ?>
			<?php endif; ?>
        
            
        </div>
        <!--/content-->
        
        
    </div>
    <!--/main content-->
    
    
    
    
<?php get_footer() ?>