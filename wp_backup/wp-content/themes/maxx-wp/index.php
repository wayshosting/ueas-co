<?php
/*
 *Template Name: Blog
 *
 * @package WordPress
 * @subpackage Maxx
 */
?>


<?php get_header()?>
    
    <!--main content-->
    <div id="main-content-wrapper" class="fixed-width-wrapper <?php /*get the sidebar layout*/ echo $data['md_layout']?>" >
    	
        <!--Breadcums-->
		<?php if ($data['md_show_breadcums'] && class_exists('simple_breadcrumb')){?>
        <div id="breadcrumb-wrapper" class="float-left">
        	<?php $breadcrumbs = new simple_breadcrumb; ?>
        </div>
        <?php }?>
        <!--/Breadcums-->

        
        <!--Page title-->
        <h1 class="page-title cufon first-word double-color"><?php echo $data['md_default_banner_text'] ?></h1>
        <!--/Page title-->
    	
        <!--Content-->
    	<div id="content" class="eqh">
        
		<?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', get_post_format() ); ?>

            <?php endwhile; ?>
            
            <!--pagination-->
            <?php md_pagi_nav(); ?>            
            <!--/pagination-->

        <?php else : ?>

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
        
        <!--/Content-->
        
        <?php get_sidebar()?>
	</div>
    <!--/main content-->
    
<?php get_footer() ?>