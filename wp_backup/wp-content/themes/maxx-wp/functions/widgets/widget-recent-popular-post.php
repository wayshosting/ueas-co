<?php
/*
	Plugin Name: Custom Recent Posts/Popular Posts
	Description: A widget that display a Recent Posts/Popular Posts
*/


/*Register Widget
/*---------------------------------------------------------------------------------------------*/
function md_recent_popular_post_widget() {
	register_widget( 'MD_Recent_Popular_Post_Widget' );
}
add_action( 'widgets_init', 'md_recent_popular_post_widget' );

/*Widget class.
/*---------------------------------------------------------------------------------------------*/
class MD_Recent_Popular_Post_Widget extends WP_Widget {

/*Widget Setup
/*---------------------------------------------------------------------------------------------*/
function MD_Recent_Popular_Post_Widget() {
	
	// Widget settings
	$widget_ops = array( 'classname' => 'md_recent_popular_post_widget', 'description' => __("Display Recent/Popular Posts from blog.", 'framework') );

	// Widget control settings
	$control_ops = array( 'id_base' => 'md_recent_popular_post_widget' );

	// Create the widget
	$this->WP_Widget( 'md_recent_popular_post_widget', __('Maxx: Recent Posts/Popular Posts', 'framework'), $widget_ops, $control_ops );
}

/*Display Widget
/*---------------------------------------------------------------------------------------------*/
function widget($args, $instance)
	{
		
		
		extract($args);
		// Our variables from the widget settings
		$title = $instance['title'];
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		$type = $instance['type'];
		
		echo $before_widget;
		
		//Echo widget title
		if($title) {
			echo $before_title.$title.$after_title;
		}

		
		if($type === 'popular'){
			$posts_query = 'numberposts='.$posts.'&orderby=comment_count&category='.$categories;
		}
		else{
			$posts_query = 'numberposts='.$posts.'&category='.$categories;
		}
		
		global $post;
		$myposts = get_posts($posts_query);	
		?>
		<ul class="list-news">
		<?php foreach($myposts as $post) : ?>
		<li>
        	
            <?php 
				$thumb = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ));
			?>
            
			<?php if(has_post_thumbnail()){ ?>
			<a href="<?php the_permalink();?>" class="img-border alignleft">
			<img src="<?php echo get_template_directory_uri() .'/functions/thumb.php?src=' . $thumb[0].'&w=50&h=50';?>" alt="<?php the_title(); ?>">
			<?php //the_post_thumbnail(array(50,50)); ?>
            </a>
			<?php } ?>
			<div>
				<p><strong><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a></strong></p>
				<em><?php the_time('F jS, Y'); ?> - <?php the_time('g:i a'); ?></em>
			</div>
		</li>
		<?php endforeach; ?>
		</ul>
		<?php
		//After widget
		echo $after_widget;
	}

/*Widget Settings (Displays the widget settings controls on the widget panel)
/*---------------------------------------------------------------------------------------------*/
function form( $instance ) {

	/* Set up some default widget settings. */
	$defaults = array(
		'title' => 'Recent Posts', 
		'categories' => 'all', 
		'posts' => 5,
		'type' => 'recent'
	);
	$instance = wp_parse_args((array) $instance, $defaults); ?>

	<p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','framework')?></label>
        <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Type','framework')?></label> 
        <select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" class="widefat" style="width:100%;">
            <option <?php if ( 'recent' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('recent','framework')?></option>
			<option <?php if ( 'popular' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('popular','framework')?></option>
        </select>
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Filter by Category','framework')?></label> 
        <select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
            <option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php _e('All categories','framework')?></option>
            <?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
            <?php foreach($categories as $category) { ?>
            <option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
            <?php } ?>
        </select>
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Number of posts','framework')?></label>
        <input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
    </p>
		
<?php
}

/*Update Widget
/*---------------------------------------------------------------------------------------------*/

function update($new_instance, $old_instance)
{
	$instance = $old_instance;
	//Strip tags for title and name to remove HTML
	$instance['title'] = strip_tags( $new_instance['title'] );
	//No need to strip tags for categories.
	$instance['categories'] = $new_instance['categories'];
	$instance['posts'] = $new_instance['posts'];
	$instance['type'] = $new_instance['type'];
	
	return $instance;
}

}