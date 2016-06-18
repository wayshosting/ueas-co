<?php
/*
	Plugin Name: Custom Recent Posts/Popular Posts without thumnail
	Description: A widget that display a Recent Posts/Popular Posts without thumnai
*/


/*Register Widget
/*---------------------------------------------------------------------------------------------*/
function md_post_widget_with_calendar() {
	register_widget( 'MD_Post_Widget_With_Calendar' );
}
add_action( 'widgets_init', 'md_post_widget_with_calendar' );

/*Widget class.
/*---------------------------------------------------------------------------------------------*/
class MD_Post_Widget_With_Calendar extends WP_Widget {

/*Widget Setup
/*---------------------------------------------------------------------------------------------*/
function MD_Post_Widget_With_Calendar() {
	
	// Widget settings
	$widget_ops = array( 'classname' => 'md_post_widget_with_calendar', 'description' => __('Display the Recent/Popular news with calendar style', 'framework') );

	// Widget control settings
	$control_ops = array( 'id_base' => 'md_post_widget_with_calendar' );

	// Create the widget
	$this->WP_Widget( 'md_post_widget_with_calendar', __('Maxx: Recent/Popular Posts (no thumb)', 'framework'), $widget_ops, $control_ops );
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
		<ul class="list-news-with-calendar list-news">
		<?php foreach($myposts as $post) : setup_postdata($post); ?>
		<li>
			<time datetime="<?php the_time('Y')?>-<?php the_time('M')?>-<?php the_time('d')?>" class="cal-post-date"><span class="date"><?php the_time('d')?></span><span class="month"><?php the_time('M')?></span></time>
			<p><strong><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a></strong></p>
            <p><?php echo excerpt(15); ?></p>
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
		'posts' => 2,
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