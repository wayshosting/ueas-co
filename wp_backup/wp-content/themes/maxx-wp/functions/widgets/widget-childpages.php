<?php
/*
	Plugin Name: Child pages widget
	Description: A widget that displays your Flickr photos
*/


/*Register Widget
/*---------------------------------------------------------------------------------------------*/
function md_childpages_widgets() {
	register_widget( 'MD_Childpages_Widget' );
}
add_action( 'widgets_init', 'md_childpages_widgets' );

/*Widget class.
/*---------------------------------------------------------------------------------------------*/
class MD_Childpages_Widget extends WP_Widget {

/*Widget Setup
/*---------------------------------------------------------------------------------------------*/
function MD_Childpages_Widget() {
	
	// Widget settings
	$widget_ops = array( 'classname' => 'md_childpages_widget', 'description' => __('Display childpages if present page only.', 'framework') );

	// Widget control settings
	$control_ops = array('id_base' => 'md_childpages_widget' );

	// Create the widget
	$this->WP_Widget( 'md_childpages_widget', __('Maxx: Child pages', 'framework'), $widget_ops, $control_ops );
}

/*Display Widget
/*---------------------------------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );

	global $post;
	// get the page id outside the loop
	$page_id = $post->ID;
	$curr_page_id = get_post( $page_id, ARRAY_A );
	$curr_page_title = $curr_page_id['post_title'];
	$curr_page_parent = $post->post_parent;

	//Our variables from the widget settings.
	$title = apply_filters('widget_title', $instance['title'] );

	//Before widget

	//Display the childpages
	if( $curr_page_parent )
		$children = wp_list_pages("title_li=&sort_column=menu_order&child_of=".$curr_page_parent."&echo=0");
	else
		$children = wp_list_pages("title_li=&sort_column=menu_order&child_of=".$page_id."&echo=0");
		
	if ( $children ) :

		echo $before_widget;
		//Display the widget title if one was input, if not display the parent page title instead.
		//Echo widget title
		if ( $title ):
			echo $before_title . $title . $after_title;
		else :?>
			<?php echo $before_title;
				$parent = get_post($post->post_parent); echo $parent->post_title; ?></h3>
			<?php echo $after_title;
		endif; ?>
		<ul>
			<?php echo $children; ?>
		</ul>

	<?php
    	//After widget 
		echo $after_widget;
	endif; 



}

/*Widget Settings (Displays the widget settings controls on the widget panel)
/*---------------------------------------------------------------------------------------------*/
function form( $instance ) {

	//Set up some default widget settings.
	$defaults = array( 'title' => 'Child pages' );
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>


	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		<br />
		<?php _e('Leave the Title field blank if you would like to display the parent page Title instead.', 'framework'); ?>
	</p>

<?php
}

/*Update Widget
/*---------------------------------------------------------------------------------------------*/
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	//Strip tags for title to remove HTML
	$instance['title'] = strip_tags( $new_instance['title'] );

	return $instance;
}

}