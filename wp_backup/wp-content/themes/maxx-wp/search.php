<?php 
/**
 * Displaying search results.
 * @package WordPress
 * @subpackage Maxx
 */
?>

<?php get_header(); ?>
    <!--main content-->
    <div id="main-content-wrapper" class="fixed-width-wrapper <?php /*get the sidebar layout*/ echo $data['md_layout']?>" >
    	
        <!--breadcrums-->
		<?php if ($data['md_show_breadcrums'] && class_exists('simple_breadcrumb')){?>
        <div id="breadcrumb-wrapper" class="float-left">
        	<?php $breadcrumbs = new simple_breadcrumb; ?>
        </div>
        <?php }?>
        <!--/breadcrums-->
        
        <h1 class="page-title cufon double-color"><?php printf( __('Results for: &ldquo;<strong>%s</strong>&rdquo;', 'framework'), get_search_query()); ?></h1>
        
        
        
        <!--Content-->
    	<div id="content" class="eqh">
        
		<?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <!--post entry-->
            <article <?php post_class('post-entry'); ?> id="post-<?php the_ID(); ?>">
                <!--post header : title, meta, featured image-->
                <header class="entry-header">
                    <!--entry title-->
                    <h2 class="entry-title cufon"><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent link to %s', 'framework'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
                    <!--/entry title-->
                    
                </header>
                <!--/post header : title, meta, featured image-->
                
                <div class="entry-summary">
					<?php the_excerpt();?>
                   
                </div>
                
            </article>
            <!--/post entry-->
            <?php endwhile; ?>
            
            <div class="sp pattern back-top"><span class="back-to-top"><?php _e('Top','framework');?></span></div>
            
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