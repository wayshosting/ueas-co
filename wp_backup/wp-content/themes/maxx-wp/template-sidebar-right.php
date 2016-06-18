<?php
/**
 * Template Name: Right Sidebar
 *
 * @package WordPress
 * @subpackage Maxx
 */
?>

<?php get_header('');?>
    <!--main content-->
    <div id="main-content-wrapper" class="fixed-width-wrapper sidebar-right" >
    	
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
        <div id="content" class="eq-h">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<!--post entry-->
            <article <?php post_class('post-entry') ?> id="post-<?php the_ID(); ?>">
                <!--entry content-->
                <div class="entry-content">
					<?php the_content();?>
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
                
                <div class="sp pattern back-top"><span class="back-to-top"><?php _e('Top','framework');?></span></div>
            </article>
            <!--/post entry-->
            
            <div class="clear"></div>
            <?php if($data['md_disable_all_pages_comment']){ comments_template('', true);} ?>
            <div class="clear"></div>
            <?php endwhile; endif; ?>
        </div>
        <!--/content-->
		<?php get_sidebar();?>
     
     </div>
    <!--/main content-->
<?php get_footer() ?>