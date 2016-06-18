<?php 
/**
 * The Archive template
 *
 * @package WordPress
 * @subpackage Maxx
 */
	
	/* Get current author data */
	if(get_query_var('author_name')) {
	$curauth = get_user_by('slug', get_query_var('author_name'));
	}
	else {
	$curauth = get_userdata(get_query_var('author'));
	}

?>

<?php get_header('');?>

	<!--main content-->
    <div id="main-content-wrapper" class="fixed-width-wrapper <?php /*get the sidebar layout*/ echo $data['md_layout']?>" >
    	
        <!--breadcrums-->
		<?php if ($data['md_show_breadcrums'] && class_exists('simple_breadcrumb')){?>
        <div id="breadcrumb-wrapper" class="float-left">
        	<?php $breadcrumbs = new simple_breadcrumb; ?>
        </div>
        <?php }?>
        <!--/breadcrums-->
        
		<?php $post = $posts[0];?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
            <h1 class="page-title cufon double-color"><?php printf(__('All posts in <strong>%s</strong>', 'framework'), single_cat_title('',false)); ?></h1>
        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
            <h1 class="page-title cufon double-color"><?php printf(__('All posts tagged <strong>%s</strong>', 'framework'), single_tag_title('',false)); ?></h1>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
            <h1 class="page-title cufon double-color"><?php _e('Archive for', 'framework') ?> <strong><?php the_time('F jS, Y'); ?></strong></h1>
         <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <h1 class="page-title cufon double-color"><?php _e('Archive for', 'framework') ?> <strong><?php the_time('F, Y'); ?></strong></h1>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <h1 class="page-title cufon double-color"><?php _e('Archive for', 'framework') ?> <strong><?php the_time('Y'); ?></strong></h1>

        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
            <h1 class="page-title cufon double-color"><?php _e('All posts by', 'framework') ?> <strong><?php echo $curauth->display_name; ?></strong></h1>
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h1 class="page-title cufon first-word double-color"><?php _e('Blog Archives', 'framework') ?></h1>
        <?php } ?>
    	<!--content-->
        <div id="content" class="eq-h">
        
        	<?php /* Start the Loop */ if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				         	
			<?php get_template_part( 'content'); ?>
            
            <?php endwhile;?>
            
            <!--pagination-->
            <?php md_pagi_nav(); ?>            
            <!--/pagination-->
            
        </div>
        <!--/content-->
        
        <?php get_sidebar();?>
        
    </div>
    <!--/main content-->

<?php get_footer() ?>