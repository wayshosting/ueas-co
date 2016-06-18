<?php
/**
 * Single portfolio page
 * @package WordPress
 * @subpackage Maxx
 */
	
?>
<?php get_header();?>

<?php

	//retrive setting from portfolio theme option
	$p_slide_effect = $data['md_porfolio_slide_effect'];
	$p_slide_direction = $data['md_porfolio_slide_direction'];
	if($data['md_porfolio_slide_height']){
		$p_slide_height = $data['md_porfolio_slide_height'];
	}else{
		$p_slide_height = 420;
	}
	 
 	// get the data from metabox
	$current_post_id = get_the_ID();
	$media_type = get_post_meta($post->ID, 'md_portfolio_type', true);
	$project_url = get_post_meta($post->ID, 'md_portfolio_url', true);
	$project_client = get_post_meta($post->ID, 'md_portfolio_client', true);
	$video_type = get_post_meta($post->ID, 'md_video_type', true);				
	$video_embed_code_id = get_post_meta($post->ID, 'md_portfolio_video_embed_code_id', true);	
				
	// check video type
	$current_video = '';
	if($video_type == 'Vimeo'){
		$current_video = '<iframe class="project-video" src="http://player.vimeo.com/video/'.$video_embed_code_id.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}
	else{
		$current_video = '<iframe class="project-video" src="http://www.youtube.com/embed/'.$video_embed_code_id.'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
	}


?>
    
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
        <h1 class="page-title cufon first-word double-color"><?php echo $data['md_portfolio_page_title'] ?></h1>
        <!--/Page title-->
        
        
        <div class="clear"></div>
    	
        <!--content-->
        <div id="content" class="fullwidth-page">
        	<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
			<!--post entry-->
            <article <?php post_class('post-entry'); ?> id="post-<?php the_ID(); ?>">
            	
                
                <div class="two-third first" id="portfolio-media-content-wrapper">
                    <div id="portfolio-media-content" class="border-frame">
						<!--<iframe width="100%" height="385" src="http://www.youtube.com/embed/s8cbak34DR0" frameborder="0" allowfullscreen></iframe>
						-->
                        
                        <?php
						
						$args = array(
							'order'          => 'ASC',
							'post_type'      => 'attachment',
							'post_parent'    => $post->ID,
							'post_mime_type' => 'image',
							'post_status'    => null,
							'numberposts'    => -1,
						);
						//Get all image in post gallery
						$attachments = get_posts($args);
						    $thumbid = 0;
							if( has_post_thumbnail($post->ID) ) {
								$thumbid = get_post_thumbnail_id($post->ID);
							}
						
						?>
                        
                        <?php if($media_type == 'image'){?>
                        <div class="flexslider" id="single-portfolio-slider">
                            <ul class="slides">
                            	<?php if ($attachments) {?>
                            	<?php foreach ( $attachments as $attachment ) { 
									
									//if get attachnent = feature image ,skip it
									//if( $attachment->ID == $thumbid ) continue;
									//get image url
									$project_image_url = wp_get_attachment_url($attachment->ID, 'full', false, false);
								?>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() . '/functions/thumb.php?src=' . $project_image_url.'&w=611&h='.$p_slide_height;?>" />
                                </li>
                                <?php } // end foreach ?>
                                <?php } // end if?>
                            </ul>
                    	</div>
                        
                        <script type="text/javascript">
                        	jQuery(window).load(function() {
								jQuery('#single-portfolio-slider.flexslider').flexslider({
									animation: "<?php echo $p_slide_effect;?>",              //String: Select your animation type, "fade" or "slide"
									direction: "<?php echo $p_slide_direction;?>",   //String: Select the sliding direction, "horizontal" or "vertical"
									slideshow: true, 
									controlNav: false,
									slideshowSpeed: 5000,
									pauseOnAction:false,
									pauseOnHover: true
									
								});
							});
                        </script>
                        <?php }else{?>
                        	<?php echo $current_video?>
                        <?php }?>
                	</div>
                </div>
                
                <div class="one-third" id="portfolio-meta-content">
                    <ul>
                        <li><h2 class="cufon"><?php the_title(); ?></h2></li>
                        <?php if(!empty($project_client)){?>
                        <li><h5><?php _e('Client','framework')?></h5><p><?php echo $project_client;?></p></li>
                        <?php }if(has_excerpt()){?>
                        <li><h5><?php _e('Description','framework')?></h5><?php the_excerpt();?></li>
                        <?php }if(!empty($project_url)){?>
                        <li><a href="<?php echo $project_url;?>" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" class="maxx-primary-button"><?php _e('Launch website &rarr;','')?></a></li>
                    	<?php }?>
                    </ul>
                </div>
                
                <div class="clear"></div>
                <br>
                
                <!--entry content-->
                <div class="entry-content">
					<?php the_content();?>
                    
                </div>
                <!--/entry content-->
                
                
            </article>
            <!--/post entry-->
            
            <div class="clear"></div>
            <div class="sp pattern back-top"><span class="back-to-top"><?php _e('Top','framework');?></span></div>
            <div class="clear"></div>
            
            <div class="m-pagination">
				<div class="float-left"><?php previous_post_link('%link',__('&larr; Previous Project','framework'))?></div>
                <div class="float-right"><?php next_post_link('%link',__('Next Project &rarr;','framework')) ?></div>
            </div>
            
			<?php endwhile; else: ?>
            
            <!--post entry-->
            <article class="post-entry post no-results not-found"  id="post-0">
                <!--post header-->
                <header class="entry-header">
                    <!--entry title-->
                    <h2 class="entry-title cufon"><?php _e( 'Nothing Found', 'framework' ); ?></h2>
                    <!--/entry title-->
                </header>
                <!--/post header-->
                
                <!--entry content-->
                <div class="entry-content">
                	<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'framework' ); ?></p>
                    <?php get_search_form(); ?>    
                </div>
                <!--/entry content-->
                
            </article>
            <!--/post entry-->
            <?php endif; ?>
            
            
            
            
        </div>
        <!--/content-->
        
        
    </div>
    <!--/main content-->
    
    
    
    
<?php get_footer() ?>