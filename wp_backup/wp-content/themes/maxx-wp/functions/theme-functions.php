<?php
/*Register the required plugins for this theme.
/*---------------------------------------------------------------------------------------------*/
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
//		array(
//			'name'     				=> 'Zilla shortcodes Generator', // The plugin name
//			'slug'     				=> 'zilla-shortcodes', // The plugin slug (typically the folder name)
//			'source'   				=> get_bloginfo('template_url').'/functions/plugins/zilla-shortcodes-1.0.zip', // The plugin source
//			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
//			'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
//			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
//			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
//			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
//		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository
		array(
			'name' 		=> 'WP-Mail-SMTP',
			'slug' 		=> 'wp-mail-smtp',
			'required' 	=> true,
		),

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'framework';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
//add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

/*Convert HEX to RGB
/*---------------------------------------------------------------------------------------------*/

function hexToRGB ($hexColor){
    if( preg_match( '/^#?([a-h0-9]{2})([a-h0-9]{2})([a-h0-9]{2})$/i', $hexColor, $matches ) )
    {
        return array(
            'red' => hexdec( $matches[ 1 ] ),
            'green' => hexdec( $matches[ 2 ] ),
            'blue' => hexdec( $matches[ 3 ] )
        );
    }
    else
    {
        return array( 0, 0, 0 );
    }
	
	/*$a = hexToRGB('FFFFFF'); 
    echo $a['red'].' - '; echo $a['green'].' - '; echo $a['blue'];*/
}

/*Check post type function
/*---------------------------------------------------------------------------------------------*/
function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

/*Get image ID from URL
/*---------------------------------------------------------------------------------------------*/
if( !function_exists( 'get_attachment_id_from_src' ) ) {
	function get_attachment_id_from_src ($image_src) {
		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
		$id = $wpdb->get_var($query);
	 
		if($id == null){
			$image_src = basename ( $image_src );
			$q2 = "SELECT post_id FROM {$wpdb->postmeta}  WHERE meta_key = '_wp_attachment_metadata' AND meta_value LIKE '%$image_src%'";
			$id = $wpdb->get_var($q2);
		}
		return $id;
	} 
}

/* Custom Walker for wp_list_categories in template-portfolio.php */
/*---------------------------------------------------------------------------------------------*/

class Portfolio_Walker extends Walker_Category {
   function start_el(&$output, $category, $depth, $args) {
   
      $cat_name = esc_attr( $category->name);
	  $link = '<a href="#" data-filter=".'.$category->slug.'">' . $cat_name .'<span> ('.$category->count.')</span></a>';

      if ( 'list' == $args['style'] ) {
          $output .= '<li';
          $class = 'cat-item cat-item-'.$category->term_id;
          if ( isset($current_category) && $current_category && ($category->term_id == $current_category) )
             $class .=  ' current-cat';
          elseif ( isset($_current_category) && $_current_category && ($category->term_id == $_current_category->parent) )
             $class .=  ' current-cat-parent';
          $output .=  '';
          $output .= ">$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
       
   }
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function mdf_tweety_oauth_info(){
	global $data;
	
	$oauth = array(
		'oauth_access_token' => $data['md_twitter_access_token'],
		'oauth_access_token_secret' => $data['md_twitter_access_token_secret'],
		'consumer_key' => $data['md_twitter_consumer_key'],
		'consumer_secret' => $data['md_twitter_consumer_secret']
	);
	
	return $oauth;
	
}

//Helper function for fetching json from twitter
function mdf_tweety_helper($requestMethod = 'GET', $url, $getfield){
	if (!class_exists('TwitterAPIExchange')) require_once('extended/TwitterAPIExchange.class.php');
	
	/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
	$settings = mdf_tweety_oauth_info();
	
	if($url === '' || $getfield === '' || $requestMethod === '') return;
	
	$exchanger = new TwitterAPIExchange($settings);
	
	$return = $exchanger->setGetfield($getfield)
				 ->buildOauth($url, $requestMethod)
				 ->performRequest(); 
				 
	return $return;
}
//Get user profile
function mdf_tweety_user_profile($user = 'Yeahthemes'){
	$transName = 'twetty-profile-'. $user;
	$cacheTime = 30; 
	
	$url = 'https://api.twitter.com/1.1/users/show.json';
	$getfield = '?screen_name=' . $user;
	$requestMethod = 'GET';
	$return = array();
	
	if(false === ($return = get_transient($transName) ) ){
		$return = mdf_tweety_helper($requestMethod, $url, $getfield); 
		$return = json_decode($return,true);
		
		set_transient($transName, $return, 60 * $cacheTime);
		
		$return = get_transient($transName);
	}else{
		$return = get_transient($transName);
	}
	return $return;
	
}
//Get user timeline
function mdf_tweety_user_timeline($count = 3, $user = 'Yeahthemes'){
	
	$transName = 'twetty-tweets-'. $user . '-count-' . $count;
	$cacheTime = 10; 
	//echo $transName;
	/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	$getfield = '?screen_name=' . $user . '&count=' . $count;
	$requestMethod = 'GET';
	
	//print_r($twitter);
	
	$return = array();
	
	
	if(false === ($return = get_transient($transName) ) ){
	
		$tweets = mdf_tweety_helper($requestMethod, $url, $getfield); 
		$tweets = json_decode($tweets,true);
		
		$i = 0;
		//print_r($tweets);
		foreach($tweets as $tweet){
			
			$tweet_text = $tweet['text'];
			$tweet_date = mdf_tweety_time($tweet['created_at']);
			
			//Replace URLs to working Links
			$tweet_text = preg_replace('/\b(?:(http(s?):\/\/)|(?=www\.))(\S+)/is', '<a href="http$2://$3" target="_blank">$1$3</a>', $tweet_text); 
			// match name@address
	    	$tweet_text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $tweet_text);
			
			//Replace username start by @ to working link
			$tweet_text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $tweet_text);
			
			//Replace hash (#) to search link
			$tweet_text = preg_replace('/\s#(\w+)/', ' <a href="https://twitter.com/search?q=$1">#$1</a>', $tweet_text);
			
			$return[$i]['tweet'] = $tweet_text;
			$return[$i]['time'] = $tweet_date;
			
			$i++;
		}
		
		// Save our new transient.
     	set_transient($transName, $return, 60 * $cacheTime);
		
		$return = get_transient($transName);
	
	}else{
		$return = get_transient($transName);
	}
	
	
	//print_r($return);
	return $return;
	
}

//Twitter relative time

function mdf_tweety_time($time) {
	//get current timestampt 
	$b = strtotime("now"); 
	//get timestamp when tweet created 
	$c = strtotime($time); 
	//get difference 
	$d = $b - $c; 
	//calculate different time values 
	$minute = 60; 
	$hour = $minute * 60; 
	$day = $hour * 24; 
	$week = $day * 7; 
	if(is_numeric($d) && $d > 0) { 
		//if less then 3 seconds 
		if($d < 3) return __('right now','framework'); 
		//if less then minute 
		if($d < $minute) return floor($d) . __(' seconds ago','framework'); 
		//if less then 2 minutes 
		if($d < $minute * 2) return __('about a minute ago','framework'); 
		//if less then hour 
		if($d < $hour) return floor($d / $minute) . __(' minutes ago','framework');
		//if less then 2 hours 
		if($d < $hour * 2) return __('about an hour ago','framework'); 
		//if less then day 
		if($d < $day) return floor($d / $hour) . __(' hours ago','framework'); 
		//if more then day, but less then 2 days 
		if($d > $day && $d < $day * 2) return __('yesterday','framework'); 
		//if less then year 
		if($d < $day * 365) return floor($d / $day) . __(' days ago','framework'); 
		//else return more than a year return "over a year ago"; 
	} 
}



?>