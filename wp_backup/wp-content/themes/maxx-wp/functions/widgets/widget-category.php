<?php
/*
	Plugin Name: Custom Category
	Description: A widget that display a single category's descendants.
*/


/*Register Widget
/*---------------------------------------------------------------------------------------------*/
function md_category_widgets() {
	register_widget( 'MD_Category_Widget' );
}
add_action( 'widgets_init', 'md_category_widgets' );

/*Widget class.
/*---------------------------------------------------------------------------------------------*/
class MD_Category_Widget extends WP_Widget {

/*Widget Setup
/*---------------------------------------------------------------------------------------------*/
function MD_Category_Widget() {
	
	// Widget settings
	$widget_ops = array( 'classname' => 'md_categories_widget', 'description' => __("A list or dropdown of a single category's descendants.", 'framework') );

	// Widget control settings
	$control_ops = array('id_base' => 'md_categories_widget' );

	// Create the widget
	$this->WP_Widget( 'md_categories_widget', __('Maxx: Custom Category', 'framework'), $widget_ops, $control_ops );
}

/*Display Widget
/*---------------------------------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$category_id = $instance['category_id'];
	$show_as_dropdown = isset( $instance['show_as_dropdown'] ) ? $instance['show_as_dropdown'] : false;
	$show_post_counts = isset( $instance['show_post_counts'] ) ? $instance['show_post_counts'] : false;
	$show_hierarchy = isset( $instance['show_hierarchy'] ) ? $instance['show_hierarchy'] : false;

	echo $before_widget;

	//Echo widget title
	if ( $title )
		echo $before_title . $title . $after_title;

	//If a category was selected, display it.
	if ( $category_id ) :
		if ( $show_as_dropdown ) : ?>
		<ul>
			<?php wp_dropdown_categories( "orderby=name&hierarchical={$show_hierarchy}&show_count={$show_post_counts}&use_desc_for_title=0&child_of=".$category_id ); ?>
		</ul>
		<?php else : ?>
		<ul>
			<?php wp_list_categories( "title_li=&orderby=name&hierarchical={$show_hierarchy}&show_count={$show_post_counts}&use_desc_for_title=0&child_of=".$category_id ); ?>
		</ul>
		<?php endif;
	endif;

	//After widget
	echo $after_widget;
}

/*Widget Settings (Displays the widget settings controls on the widget panel)
/*---------------------------------------------------------------------------------------------*/
function form( $instance ) {

	/* Set up some default widget settings. */
	$defaults = array( 'title' => __('Categories', 'framework'), 'category_id' => '', 'show_as_dropdown' => false, 'show_post_counts' => false, 'show_hierarchy' => false );
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'category_id' ); ?>"><?php _e('Category to be displayed:', 'framework'); ?></label>
		<?php wp_dropdown_categories('show_option_all=Select Category&hierarchical=1&orderby=name&selected='.$instance['category_id'].'&name='.$this->get_field_name( 'category_id' ).'&class=widefat'); ?>

	</p>


	<p>
		<label for="<?php echo $this->get_field_id( 'show_as_dropdown' ); ?>">
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_as_dropdown'], true ); ?> id="<?php echo $this->get_field_id( 'show_as_dropdown' ); ?>" name="<?php echo $this->get_field_name( 'show_as_dropdown' ); ?>" value="1" <?php checked('1', $instance['show_as_dropdown']); ?> />
			<?php _e('Show as dropdown', 'framework'); ?>
		</label><br />

		<label for="<?php echo $this->get_field_id( 'show_post_counts' ); ?>">
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_post_counts'], true ); ?> id="<?php echo $this->get_field_id( 'show_post_counts' ); ?>" name="<?php echo $this->get_field_name( 'show_post_counts' ); ?>" value="1" <?php checked('1', $instance['show_post_counts']); ?> />
			<?php _e('Show post counts', 'framework'); ?>
		</label><br />

		<label for="<?php echo $this->get_field_id( 'show_hierarchy' ); ?>">
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_hierarchy'], true ); ?> id="<?php echo $this->get_field_id( 'show_hierarchy' ); ?>" name="<?php echo $this->get_field_name( 'show_hierarchy' ); ?>" value="1" <?php checked('1', $instance['show_hierarchy']); ?> />
			<?php _e('Show hierarchy', 'framework'); ?>
		</label>
	</p>
		
<?php
}

/*Update Widget
/*---------------------------------------------------------------------------------------------*/
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	//Strip tags for title and name to remove HTML
	$instance['title'] = strip_tags( $new_instance['title'] );
	
	//No need to strip tags for categories.
	$instance['category_id'] = $new_instance['category_id'];
	$instance['show_as_dropdown'] = $new_instance['show_as_dropdown'];
	$instance['show_post_counts'] = $new_instance['show_post_counts'];
	$instance['show_hierarchy'] = $new_instance['show_hierarchy'];

	return $instance;
}
}