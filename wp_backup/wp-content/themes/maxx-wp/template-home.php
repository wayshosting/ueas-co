<?php
/*
 *Template Name: Home Page Skitter Slider
 *
 * @package WordPress
 * @subpackage Maxx
 */

?>

<?php get_header()?>

<style>
#wrap-all{
	background-position:center 300px;
}
</style>  

	<script> 
	jQuery(window).resize(function () {
		jQuery('.container_skitter,.info_slide_dots').removeAttr('style');
	})
	</script>
    <div id="bodyhehe"></div>
    
	<?php include('functions/skitter-slider.php')?>


    <!--main content-->
    <div id="main-content-wrapper" class="fixed-width-wrapper home-page" >
    
    	<!--Content-->
    	<div class="entry-content" >
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!--post entry-->
            <article class="post-entry" id="post-<?php the_ID(); ?>">
				<?php the_content();?>
                <?php wp_link_pages(
                    array(
                        'before' => '<div class="link-pages"><strong>'.__('Pages:', 'framework').'</strong> ', 
                        'after' => '</div>', 
                        'next_or_number' => 'number',
                        'nextpagelink'     => __('Next &rarr;', 'framework'),
						'previouspagelink'     => __('&larr; Prev', 'framework')
                    )
                );?>
            </article>
            <!--/post entry-->
            <?php endwhile; endif; ?>    
        </div>
        <!--/Content-->
        
        
    </div>
    <!--/main content-->
    
    <div class="clear"></div>
   

<?php get_footer()?>