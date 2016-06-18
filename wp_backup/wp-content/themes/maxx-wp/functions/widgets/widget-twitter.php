<?php
/*
	Plugin Name: Twitter intergrator
	Description: Plugin for displaying your latest tweets.
*/


/*Register Widget
/*---------------------------------------------------------------------------------------------*/
function md_twitter_widget_init() {
	register_widget( 'MD_Twitter_Widget' );
}
add_action( 'widgets_init', 'md_twitter_widget_init' );
	
/*Widget class.
/*---------------------------------------------------------------------------------------------*/
class MD_Twitter_Widget extends WP_Widget {

/*Widget Setup
/*---------------------------------------------------------------------------------------------*/
function MD_Twitter_Widget() {
	
	// Widget settings
	$widget_ops = array('description' => __('Displaying your latest tweets.', 'framework'));
	
	// Widget control settings
	$control_ops = array('id_base' => 'md_twitter_widget');
	
	// Create the widget
	$this->WP_Widget( 'md_twitter_widget', __('Maxx: Twitter Feeds', 'framework'), $widget_ops, $control_ops );

}

/*Display Widget
/*---------------------------------------------------------------------------------------------*/
function widget( $args, $instance ) {
	
	// outputs the content of the widget
	global $wpdb;
	extract( $args );
	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$username = $instance['username'];
	$no_of_tweets = $instance['no_of_tweets'];
	
	echo $before_widget;
	
	//Echo widget title
	if ( $title ){echo $before_title . $title . $after_title;}
		
	$tweets = mdf_tweety_user_timeline($no_of_tweets, $username);
	
	echo '<div><ul class="widget-twitter">';
		foreach($tweets as $tweet){
			echo '<li><p>', $tweet['tweet'] ,'</p><em>', $tweet['time'] ,'</em></li>';
		}
	echo '</ul>';
	echo '<br><p><a href="http://twitter.com/'.$username.'" target="_self" title="'. __('Follow me on twitter &rarr;','framework') . '">'. __('Follow me on twitter &rarr;','framework') . '</a></p></div>';
		
	echo $after_widget;
}

/*Widget Settings (Displays the widget settings controls on the widget panel)
/*---------------------------------------------------------------------------------------------*/
function form($instance) {
	
	// Set up some default widget settings
	$defaults = array(
		'title' => 'Latest Tweets',
		'username' => 'Yeahthemes',
		'no_of_tweets' => '3'
	);
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title:','framework')?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Username:','framework')?></label>
		<input id="<?php echo $this->get_field_id( 'username' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo $instance['username']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'no_of_tweets' ); ?>"><?php _e('Number of tweets to show:','framework')?></label>
		<input id="<?php echo $this->get_field_id( 'no_of_tweets' ); ?>" class='widefat' name="<?php echo $this->get_field_name( 'no_of_tweets' ); ?>" type="text" value="<?php echo $instance['no_of_tweets']; ?>" />
	</p>
	
	<?php
}

/*Update Widget
/*---------------------------------------------------------------------------------------------*/
function update( $new_instance, $old_instance ) {
	
	// processes widget options to be saved
	$instance = $old_instance;

	//Strip tags for title and name to remove HTML 
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['username'] = strip_tags( $new_instance['username'] );
	$instance['no_of_tweets'] = strip_tags( $new_instance['no_of_tweets'] );
	
	return $instance;
}
}
?>