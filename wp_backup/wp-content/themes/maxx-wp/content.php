<?php

/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Maxx
 */
	global $data;
	$post_featured_image_height = $data['md_post_featured_image_height'];
?>
            <!--post entry-->
            <article <?php post_class('post-entry'); ?> id="post-<?php the_ID(); ?>">
                <!--post header : title, meta, featured image-->
                <header class="entry-header">
                    <!--entry title-->
                    <h2 class="entry-title cufon"><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent link to %s', 'framework'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
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
                    
                    <?php
					//Custom feature image size from theme option
					
					$feature_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					
					$feature_image_resized = '';
					if($post_featured_image_height){
						$feature_image_resized = '/functions/thumb.php?src=' . $feature_image_url.'&w=720&h='.$post_featured_image_height;
					}
					
					$rel = 'prettyPhoto';
					
					if($data['md_blog_featured_image_link'] != 'lightbox') {
						$feature_image_url = get_permalink();
						$rel = '';
					}
					?>
                   
                    <?php if(has_post_thumbnail()){?>
                    <!--featured image-->
                    <div class="featured-image"><a href="<?php echo $feature_image_url?>" class="img-border image-preview" rel="<?php echo $rel?>" title="<?php the_title(); ?>">
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
                
                
                <?php if ($data['md_enable_post_excerpt']) { ?>
                <!--entry summary-->
                <div class="entry-summary">
                   <?php the_excerpt();?>
                </div>
                
                <!--/entry-summary -->
                <?php }else { ?>
               	<!--entry content-->
                <div class="entry-content">
					<?php the_content();?>
                </div>
                <!--/entry content-->
                <?php }?>
                
                <?php if ($data['md_hide_readmore_button']) { ?>
                <div class="read-more permalink"><a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read more','framework') ?></a></div>
                <?php }?>
                
                <div class="sp pattern back-top"><span class="back-to-top"><?php _e('Top','framework');?></span></div>
            </article>
            <!--/post entry-->