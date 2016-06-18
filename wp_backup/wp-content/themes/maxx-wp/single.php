<?php
/**
 * Single page
 * @package WordPress
 * @subpackage Maxx
 */
?>
<?php get_header('');?>

<?php 
	$post_featured_image_height = $data['md_post_featured_image_height'];
?>
    
    <!--main content-->
    <div id="main-content-wrapper" class="fixed-width-wrapper <?php /*get the sidebar layout*/ echo $data['md_layout']?>" >
    	
        <!--breadcrums-->
		<?php if ($data['md_show_breadcrums'] && class_exists('simple_breadcrumb')){?>
        <div id="breadcrumb-wrapper" class="float-left">
        	
        	<?php $breadcrumbs_go = new simple_breadcrumb; ?>
        </div>
        <?php }?>
        
        <!--/breadcrums-->
        
        <!--Page title-->
        <h1 class="page-title cufon first-word double-color"><?php echo $data['md_default_banner_text'] ?></h1>
        <!--/Page title-->
    	

		<!--content-->
        <div id="content" class="eq-h">
        	<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
			<!--post entry-->
            <article <?php post_class('post-entry'); ?> id="post-<?php the_ID(); ?>">
                <!--post header : title, meta, featured image-->
                <header class="entry-header">
                    <!--entry title-->
                    <h2 class="entry-title cufon"><?php the_title(); ?></h2>
                    <!--/entry title-->
                    
                    <!--entry meta-->
                    <div class="entry-meta">
                        <ul>
                        	<?php if(isset($data['md_show_post_meta_info']['date'])){?>
                            <li class="post-date"><time datetime="<?php the_time('Y')?>-<?php the_time('M')?>-<?php the_time('d')?>"><?php the_time('M')?> <?php the_time('d')?> <?php the_time('Y')?></time></li>
                            <?php } if(isset($data['md_show_post_meta_info']['author'])){?>
                            <li class="post-author">by <?php the_author_posts_link(); ?></li>
                            <?php } if(isset($data['md_show_post_meta_info']['category'])){?>
                            <li class="post-categories">In <?php the_category(' , ')?></li>
                            <?php } if(isset($data['md_show_post_meta_info']['comments'])){?>
                            <li class="post-comments"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></li>
                             <?php }?>
                        </ul>
                    </div>
                    <!--/entry meta-->
                    
                    <?php if(has_excerpt()){
                    	the_excerpt();
                   }?>
                    
                   <?php
					//Custom feature image from theme option
					
					$feature_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					
					$feature_image_resized = '';
					if($post_featured_image_height){
						$feature_image_resized = '/functions/thumb.php?src=' . $feature_image_url.'&w=720&h='.$post_featured_image_height;
					}
					?>
                   
                    <?php if(has_post_thumbnail()){?>
                    <!--featured image-->
                    <div class="featured-image"><a href="<?php echo $feature_image_url?>" class="img-border image-preview" rel="prettyPhoto" title="<?php the_title(); ?>">
                    <?php if($post_featured_image_height){?>
                    	<img src="<?php echo get_template_directory_uri() . $feature_image_resized;?>" alt="<?php the_title(); ?>">
                    <?php }else{?>
                    	<?php the_post_thumbnail();?>
					<?php }?>
                    
                    </a></div>
                    <!--featured image-->
                    <?php }else{?>
                    <div class="sp"></div>
                    <?php }?>

                    
                </header>
                <!--/post header : title, meta, featured image-->
                
                <!--entry content-->
                <div class="entry-content">
					<?php the_content();?>
                </div>
                <!--/entry content-->
                
                <div class="clear"></div>
                <div class="sp pattern back-top"><span class="back-to-top"><?php _e('Top','framework');?></span></div>
                <div class="clear"></div>
                
                <?php if(has_tag()){?>
                <!--post tags-->
                <footer class="post-tags">
                	<?php the_tags('<strong>' . __('Tags:', 'framework') . '</strong>','',''); ?>
                </footer>
                <!--/post tags-->
                
                <div class="sp"></div>
                <?php }?>
                
                
                
                <!--About author of post-->
                <div class="post-author-area">
                	<a href="<?php the_author_meta('user_url'); ?>" class="img-border alignleft gravatar"><?php echo get_avatar( get_the_author_meta('user_email'), '75', '' );  ?></a>
                    <h3><?php _e('By','framework')?> <a href="<?php the_author_meta('user_url'); ?>"><strong><?php the_author_meta('nickname')?></strong></a></h3>
                    <p class="author-meta"><?php the_author_meta('description'); ?>...</p>
                	<p><?php _e('View all articles by','framework')?> <strong><?php the_author_posts_link(); ?></strong></p>

					
                    
                    <ul class="social-profiles">
                    	<?php /*Retrieve social profile link*/
							$social_a = array('twitter', 'dribbble', 'facebook', 'googleplus', 'tumblr','deviantart','linkedin','flickr','forrst','github','youtube');
						foreach($social_a as $social_b):
							if(get_the_author_meta($social_b)){
						?>
						<li class="social-profile-<?php echo $social_b?>"><a href="<?php the_author_meta($social_b); ?>"><span><?php echo $social_b?></span></a></li>
						
						<?php		
							} endforeach;
						?>
                        	
                    </ul>

                    
                </div>
                <!--/About author of post-->
                <div class="sp"></div>
            </article>
            <!--/post entry-->
            
            
            
            <div class="clear"></div>
            <?php comments_template('', true); ?>
			
            <div class="clear"></div>
            <div class="sp pattern back-top"><span class="back-to-top"><?php _e('Top','framework');?></span></div>
            <div class="clear"></div>
            
            <div class="m-pagination">
				<div class="float-left"><?php previous_post_link('%link',__('&larr; Previous Post','framework'))?></div>
                <div class="float-right"><?php next_post_link('%link',__('Next Post &rarr;','framework')) ?></div>
            </div>
            
			<?php endwhile; else: ?>
            
            <!--post entry-->
            <article class="post-entry post no-results not-found" id="post-0">
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
		<?php get_sidebar();?>
        
        
    </div>
    <!--/main content-->
    
    
    
    
<?php get_footer() ?>