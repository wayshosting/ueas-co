<?php
/*
 * Template Name: Archives
 *
 * @package WordPress
 * @subpackage Maxx
 */
?>


<?php get_header('');?>
    

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
        <article <?php post_class('post-entry') ?> id="post-<?php the_ID(); ?>">
        	<!--entry content-->
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="entry-content">
            	<?php the_content()?>
            </div>
            <?php endwhile; endif; ?>
            <!--/entry content-->
            
            <!--entry content-->
            <div class="entry-content">
                
                <div class="one-third first">
                	<!--Latest 10 posts-->
                    <h4><?php _e('Last <strong>10</strong> Posts', 'framework') ?></h4>
                    <div class="sp pattern"></div>
                    <ol class="ordered-list sp-list">
                        <?php $archive_10 = get_posts('numberposts=10');
                        foreach($archive_10 as $post) : ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
                        <?php endforeach; ?>
                    </ol>
                    
                    <div class="sp"></div>
                    <!--Portfolio Category-->
                    <h4><?php _e('Portfolio <strong>Category</strong>:','framework')?></h4>
                    <div class="sp pattern"></div>
                    <?php
						$args = array(
						  'orderby' => 'name',
						  'show_count' => 0,
						  'pad_counts' => 0,
						  'hierarchical' => 1,
						  'taxonomy' => 'portfolio-type',
						  'title_li' => ''
						);
					?>
					<ul class="sp-list unordered-list">
					<?php wp_list_categories($args); ?>
					</ul>
                </div>
                
                
                <div class="one-third">
                	<!--Blog category-->
                    <h4><?php _e('Blog <strong>Category</strong>:','framework')?></h4>
                    <div class="sp pattern"></div>
                    <ul class="sp-list unordered-list">
                         <?php wp_list_categories('title_li=') ?>
                    </ul>
                    
                    <!--Archives by month-->
                    <div class="sp"></div>
                    <h4><?php _e('Archives by <strong>Month</strong>:','framework')?></h4>
                    <div class="sp pattern"></div>
                    <ul class="sp-list unordered-list">
                        <?php wp_get_archives('type=monthly'); ?>
                    </ul>
                    
                    
                </div>
                
                <!--List of pages-->
                <div class="one-third">
                    <h4><?php _e('<strong>Pages</strong>:','framework')?></h4>
                    <div class="sp pattern"></div>
                    <ul class="sp-list unordered-list"><?php wp_list_pages("title_li=" ); ?></ul> 
                </div>
                
            </div>
            <!--/entry content-->
            <div class="sp pattern back-top"><span class="back-to-top"><?php _e('Top','framework');?></span></div>
            </article>
        </div>
        <!--/content-->
    </div>
    <!--/main content-->
<?php get_footer() ?>