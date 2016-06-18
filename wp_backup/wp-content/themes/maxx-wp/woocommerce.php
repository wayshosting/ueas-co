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
        	<?php woocommerce_content(); ?>
        </div>
        <!--/content-->
		<?php get_sidebar();?>
        
        
    </div>
    <!--/main content-->
    
    
    
    
<?php get_footer() ?>