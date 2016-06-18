<?php
/*
	Plugin Name: Flickr widget
	Description: A widget that displays your Flickr photos
*/


/*Register Widget
/*---------------------------------------------------------------------------------------------*/
function md_flickr_widgets() {
	register_widget( 'MD_FlickR_Widget' );
}
add_action( 'widgets_init', 'md_flickr_widgets' );

/*Widget class.
/*---------------------------------------------------------------------------------------------*/
class MD_Flickr_Widget extends WP_Widget {

/*Widget Setup
/*---------------------------------------------------------------------------------------------*/	
function MD_FlickR_Widget() {

	// Widget settings
	$widget_ops = array('classname' => 'md_flickr_widget','description' => __('Display Flickr photos.', 'framework'));

	// Widget control settings
	$control_ops = array('id_base' => 'md_flickr_widget');

	// Create the widget
	$this->WP_Widget( 'md_flickr_widget', __('Maxx: Flickr Photos', 'framework'), $widget_ops, $control_ops );
	
}

/*Display Widget
/*---------------------------------------------------------------------------------------------*/	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$flickrID = $instance['flickrID'];
	$postcount = $instance['postcount'];
	$type = $instance['type'];
	$display = $instance['display'];

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display Flickr Photos
	 ?>
		
	<div id="flickr-photos" class="md-widget-flickr">
	
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $postcount ?>&amp;display=<?php echo $display ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type ?>&amp;<?php echo $type ?>=<?php echo $flickrID ?>"></script>
		<script type="text/javascript">
        	jQuery(document).ready(function(){
				jQuery(".md-widget-flickr div a").addClass("img-border")
			});
        
        </script>
	</div>
	
	<?php

	// After widget (defined by theme functions file)
	echo $after_widget;
	
}

/*Widget Settings (Displays the widget settings controls on the widget panel)
/*---------------------------------------------------------------------------------------------*/	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'Flickr Photos',
		'flickrID' => '52617155@N08',
		'postcount' => '6',
		'type' => 'user',
		'display' => 'latest',
		'size' => 's',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'flickrID' ); ?>"><?php _e('Flickr ID:', 'framework') ?> (<a href="http://idgettr.com/">idGettr</a>)</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'flickrID' ); ?>" name="<?php echo $this->get_field_name( 'flickrID' ); ?>" value="<?php echo $instance['flickrID']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of Photos:', 'framework') ?></label>
		<select id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" class="widefat">
		<?php for ( $i = 3; $i <= 12; $i += 3) { ?>
			<option value="<?php echo $i; ?>" <?php selected( $instance['postcount'], $i ); ?>><?php echo $i; ?></option>
		<?php } ?>
		</select>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type (user or group):', 'framework') ?></label>
		<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
			<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('user','framework')?></option>
			<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('group','framework')?></option>
		</select>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display (random or latest):', 'framework') ?></label>
		<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
			<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>><?php _e('random','framework')?></option>
			<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>><?php _e('latest','framework')?></option>
		</select>
	</p>
		
	<?php
}

/*Update Widget
/*---------------------------------------------------------------------------------------------*/	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip tags to remove HTML
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['flickrID'] = strip_tags( $new_instance['flickrID'] );

	// No need to strip tags
	$instance['postcount'] = $new_instance['postcount'];
	$instance['type'] = $new_instance['type'];
	$instance['display'] = $new_instance['display'];
	
	return $instance;
}
}