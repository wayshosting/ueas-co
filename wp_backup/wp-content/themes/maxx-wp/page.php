<?php
/**
 * The page template
 *
 * @package WordPress
 * @subpackage Maxx
 */
?>

<?php get_header();?>
    
    <!--main content-->
    <div id="main-content-wrapper" class="fixed-width-wrapper <?php /*get the sidebar layout*/ echo $data['md_layout']?>" >
    	
        <!--breadcrums-->
		<?php if ($data['md_show_breadcrums'] && class_exists('simple_breadcrumb')){?>
        <div id="breadcrumb-wrapper" class="float-left">
        	<?php $breadcrumbs = new simple_breadcrumb; ?>
        </div>
        <?php }?>
        <!--/breadcrums-->
        
        <?php $post = $posts[0]; 
			if (is_page()) {?>
            <!--Page title-->
        	<h1 class="page-title cufon first-word double-color"><?php the_title(); ?></h1>
            <!--/Page title-->
		<?php }?>
        
    	

		<!--content-->
        <div id="content" class="eq-h">
        	<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
			<!--post entry-->
            <article <?php post_class('post-entry'); ?> id="post-<?php the_ID(); ?>">
                <!--entry content-->
                <div class="entry-content">
					<?php the_content();?>
                    
                    
                </div>
                <!--/entry content-->
                
                
                <div class="sp pattern back-top"><span class="back-to-top"><?php _e('Top','framework');?></span></div>
            </article>
            <!--/post entry-->
        
            <div class="clear"></div>
            
            <?php if($data['md_disable_all_pages_comment']){ comments_template('', true);} ?>
            
            <?php endwhile; else: ?>
            <!--post entry-->
            <article <?php post_class('post-entry'); ?>  id="post-0">
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