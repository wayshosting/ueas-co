<?php

/*
 *Template Name: Portfolio
 *
 * @package WordPress
 * @subpackage Maxx
 *
 */

?>



<?php get_header()?>

<?php
	$porfolio_featured_image_height = $data['md_porfolio_featured_image_height'];
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
        <div id="content" class="portfolio-page">
        
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php if(get_the_content()){?>
        <!--post entry-->
        <article <?php post_class('post-entry') ?>>
            <!--entry content-->
            <div class="entry-content">
                
                <?php the_content(); ?>
                <?php wp_link_pages(
                    array(
                        'before' => '<div class="link-pages"><strong>'.__('Pages:', 'framework').'</strong> ', 
                        'after' => '</div>', 
                        'next_or_number' => 'number',
                        'nextpagelink'     => __('Next &rarr;', 'framework'),
                        'previouspagelink'     => __('&larr; Prev', 'framework'),
                    )
                );?>
                
            </div>
            <!--/entry content-->
            
        </article>
        <!--/post entry-->
        <?php }?>
        <?php endwhile; endif; ?>  
        <article <?php post_class('post-entry') ?> id="post-<?php the_ID(); ?>">
			<script language="javascript">
			jQuery(document).ready(function($) {
								
				// cache container
				var $container = jQuery('#portfolio-items');
				
				$container.imagesLoaded( function(){
					// initialize isotope
					$container.isotope({
						animationEngine : 'best-available',
						animationOptions: {
							duration: 200,
							easing: 'easeInOutQuad',
							queue: false
						},
						layoutMode : '<?php echo $data['md_portfolio_layout'];?>'//fitRows,	
					});
				
				});
				
				// filter items when filter link is clicked
				jQuery('#portfolio-filter li a').click(function(){
					jQuery('#portfolio-filter li a').removeClass('active');
					jQuery(this).addClass('active');
					var selector = $(this).attr('data-filter');
					$container.isotope({ filter: selector });
					return false;
				});
				
			
			});
			
			</script>
            
            <!--Portfolio filter-->
            <ul id="portfolio-filter"> 
                <li><a href="#" data-filter="*" class="active"><?php _e('All Projects', 'framework'); ?><span> (<?php echo wp_count_posts('portfolio')->publish; ?>)</span></a></li>
				<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'portfolio-type', 'walker' => new Portfolio_Walker())); ?> 
            </ul>
            <!--/Portfolio filter-->
            <div class="clear"></div>
            
            <!--Portfolio items-->
            <div id="portfolio-items-wrapper">
            <div id="portfolio-items" class="portfolio-<?php echo $data['md_porfolio_columns']?>-columns">
            	<?php $args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1,'orderby' => 'menu_order','order' => 'DESC');
				
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
                
                <?php $terms = get_the_terms( get_the_ID(), 'portfolio-type' ); ?>
                
                <?php 
				//Get the thumbnail url
				$image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id,'full', true);
				
				
				//Custom feature image size from theme option
				$feature_image_url = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'portfolio-thumb' );

				$feature_image_resized = '';
				if($porfolio_featured_image_height){
					$feature_image_resized = '/functions/thumb.php?src=' . $feature_image_url[0].'&w=282&h='.$porfolio_featured_image_height;
				}
				
				//Get the data from custom metabox field 
				$media_type = get_post_meta($post->ID, 'md_portfolio_type', true);				
				$video_type = get_post_meta($post->ID, 'md_video_type', true);				
				$video_embed_code_id = get_post_meta($post->ID, 'md_portfolio_video_embed_code_id', true);	
							
				//check type of video
				$current_video_link = "";
				if($video_type == 'Vimeo'){
					$current_video_link = 'http://vimeo.com/'.$video_embed_code_id;
				}
				else{
					$current_video_link = 'http://www.youtube.com/watch?v='.$video_embed_code_id;
				}
				
				
               	?>
                
                <!--project entry-->
                <article class="project-entry <?php if(is_array($terms)) : foreach ($terms as $term) { echo $term->slug.' '; } endif; ?>" id="post-<?php the_ID(); ?>">				
                
                	<?php 
						
						$feature_image_url = '';
						
						
						//type of feature image link
						//if is video, link will be video link
						if(($media_type == 'video') && ($video_embed_code_id != "") ){
							
							$feature_image_url = $current_video_link; 
							
						}else{ 
						//if is video, link will be the original featured image
							$feature_image_url = $image_url[0];
							
						};
						$rel = 'prettyPhoto[' . 'term'. $term-> term_id . ']';
						//$rel = 'prettyPhoto[term-gallery]';
						
						if($data['md_portfolio_featured_image_link'] != 'lightbox') {
							$feature_image_url = get_permalink();
							$rel = '';
						}
					?>
                    
                    <?php if ( has_post_thumbnail()) { ?> 
                    <a href="<?php echo $feature_image_url;?>" title="<?php the_title(); ?>" rel="<?php echo $rel; ?>"  class="img-border align-none project-thumbnail <?php echo $media_type;?>-preview">
					
					<?php if($porfolio_featured_image_height){?>
						<img src="<?php echo get_template_directory_uri() . $feature_image_resized;?>" alt="<?php the_title(); ?>">
                    <?php }else{?>
                        <?php the_post_thumbnail('portfolio-thumb'); ?>	
                    <?php }?>
                    
                    </a>
                    <?php }?>
                    
                    <?php 
					if(!$data['md_hide_portfolio_title']){
					
					// Porfolio Columns from theme settings	
					if($data['md_porfolio_columns'] == '3'){?>
                    <h4 class="cufon first-word"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                    <?php }else{?>
                    <h5 class="cufon first-word"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                    <?php }} ?>
                    
					<?php 
					//enable excerpt
					if ($data['md_enable_portfolio_excerpt']) { ?>
                    <?php the_excerpt();?>
                    <?php }?>
                    
                    <?php 
					//readmore button
					if ($data['md_hide_preadmore_button']) { ?>
					<a href="<?php the_permalink();?>" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" class="read-more"><?php _e('Read more','framework')?></a>
                    <?php }?>
                    <div class="sp"></div>
                    <div class="clear"></div>
                    
                </article>
                <!--/project entry--> 
                
				<?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            </div>
            <!--/Portfolio items-->
            </article>
        </div>
        <!--/Content-->
    </div>
    <!--/main content-->
    


<?php get_footer()?>