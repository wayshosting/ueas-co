<?php
/*
	Shortcode Generator
	Author: Manh
	Author URI: http://dmanh.com,  http://properdo.com
	Description: Created by Manh
	Version: 1.0
	License: Under GPL & GNU
*/
/*---------------------------------------------------------------------------------------------*/


/* Clean up Shortcodes
/*Clean Up WordPress Shortcode Formatting - important for nested shortcodes
/*adjusted from http://donalmacarthur.com/articles/cleaning-up-wordpress-shortcode-formatting */
function parse_shortcode_content( $content ) {

   /* Parse nested shortcodes and add formatting. */
    $content = trim( do_shortcode( shortcode_unautop( $content ) ) );

    /* Remove '' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '' )
        $content = substr( $content, 4 );

    /* Remove '' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '' )
        $content = substr( $content, 0, -3 );

    /* Remove any instances of ''. */
    $content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );

    return $content;
}

//move wpautop filter to AFTER shortcode is processed
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );

// Enable shortcodes in widget areas
add_filter('widget_text', 'do_shortcode');


/*Columns
/*---------------------------------------------------------------------------------------------*/

// 1/2
function md_one_half( $atts, $content = null ) {
   return '<div class="one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'md_one_half');

function md_one_half_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="one-half first">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half_first', 'md_one_half_first');


// 1/3
function md_one_third( $atts, $content = null ) {
   return '<div class="one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'md_one_third');

function md_one_third_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="one-third first">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third_first', 'md_one_third_first');

// 2/3
function md_two_third( $atts, $content = null ) {
   return '<div class="two-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'md_two_third');

function md_two_third_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="two-third first">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third_first', 'md_two_third_first');

// 1/4
function md_one_fourth( $atts, $content = null ) {
   return '<div class="one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'md_one_fourth');

function md_one_fourth_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="one-fourth first">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth_first', 'md_one_fourth_first');

// 2/4
function md_two_fourth( $atts, $content = null ) {
   return '<div class="two-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fourth', 'md_two_fourth');

function md_two_fourth_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="two-fourth first">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fourth_first', 'md_two_fourth_first');

// 3/4
function md_three_fourth( $atts, $content = null ) {
   return '<div class="three-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'md_three_fourth');

function md_three_fourth_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="three-fourth first">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth_first', 'md_three_fourth_first');

// 1/5
function md_one_fifth( $atts, $content = null ) {
   return '<div class="one-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'md_one_fifth');

function md_one_fifth_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="one-fifth first">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth_first', 'md_one_fifth_first');

// 2/5
function md_two_fifth( $atts, $content = null ) {
   return '<div class="two-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'md_two_fifth');

function md_two_fifth_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="two-fifth first">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth_first', 'md_two_fifth_first');

// 3/5
function md_three_fifth( $atts, $content = null ) {
   return '<div class="three-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'md_three_fifth');

function md_three_fifth_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="three-fifth first">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth_first', 'md_three_fifth_first');

// 4/5
function md_four_fifth( $atts, $content = null ) {
   return '<div class="four-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'md_four_fifth');

function md_four_fifth_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="four-fifth first">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth_first', 'md_four_fifth_first');

// 1/6
function md_one_sixth( $atts, $content = null ) {
   return '<div class="one-sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'md_one_sixth');

function md_one_sixth_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="one-sixth first">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth_first', 'md_one_sixth_first');

// 5/6
function md_five_sixth( $atts, $content = null ) {
   return '<div class="five-sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'md_five_sixth');

function md_five_sixth_first( $atts, $content = null ) {
   return '<div class="clear"></div><div class="five-sixth first">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth_first', 'md_five_sixth_first');


/*Separator
/*---------------------------------------------------------------------------------------------*/

function md_divider( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type' => ''
	),$atts));
	?><?php $sp_image = get_template_directory_uri().'/images/large-seperator.png';
	
	if($type =='shadow'){
		return '<div class="clear"></div><div class="sp '. $type .'"><img src="'.$sp_image.'"></div>';
	}
	elseif($type =='back-top'){
		return '<div class="sp pattern '.$type.'"><span class="back-to-top">Top</span></div>';
	}
	elseif($type =='clear'){
		return '<div class="clear"></div>';
	}
	else{
		return '<div class="clear"></div><div class="sp '. $type .'"></div>';	
	}
	
}
add_shortcode('divider', 'md_divider');

/*Double color H1
/*---------------------------------------------------------------------------------------------*/

function md_h1( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style' => '',
	),$atts));
	
   return '<h1 class="cufon '.$style.' ">'.$content.'</h1>';
}
add_shortcode('h1', 'md_h1');

/*Double color H2
/*---------------------------------------------------------------------------------------------*/
function md_h2( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style' => '',
	),$atts));
	
   return '<h2 class="cufon '.$style.' ">'.$content.'</h2>';
}
add_shortcode('h2', 'md_h2');

/*Double color H3
/*---------------------------------------------------------------------------------------------*/
function md_h3( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style' => '',
	),$atts));
	
   return '<h3 class="cufon '.$style.' ">'.$content.'</h3>';
}
add_shortcode('h3', 'md_h3');

/*Double color H4
/*---------------------------------------------------------------------------------------------*/
function md_h4( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style' => '',
	),$atts));
	
   return '<h4 class="cufon '.$style.' ">'.$content.'</h4>';
}
add_shortcode('h4', 'md_h4');

/*Double color H5
/*---------------------------------------------------------------------------------------------*/
function md_h5( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style' => '',
	),$atts));
	
   return '<h5 class="cufon '.$style.' ">'.$content.'</h5>';
}
add_shortcode('h5', 'md_h5');

/*Double color H6
/*---------------------------------------------------------------------------------------------*/
function md_h6( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style' => '',
	),$atts));
	
   return '<h6 class="cufon '.$style.' ">'.$content.'</h6>';
}
add_shortcode('h6', 'md_h6');



/*Drop cap
/*---------------------------------------------------------------------------------------------*/

function md_dropcap( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'type' => ''
	),$atts));
	if($type == 'quote'){
		return '<span class="quote"></span>';
	}
	if($type == 'circleprimary'){
		return '<span class="drop-cap circle primary">' . $content . '</span>';
	}
	else{
   		return '<span class="drop-cap '. $type .' ">' . $content . '</span>';
	}
}
add_shortcode('dropcap', 'md_dropcap');

/*Block quote
/*---------------------------------------------------------------------------------------------*/

function md_blockquote( $atts, $content = null) {
	return '<blockquote>' . do_shortcode($content) . '</blockquote>';
}
add_shortcode('blockquote', 'md_blockquote');

/*List
/*---------------------------------------------------------------------------------------------*/

function md_list( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'type' => ''
	),$atts));
   return '<ul class="md-list  '. $type .' ">' .do_shortcode($content). '</ul>';
}


function md_list_li( $atts, $content = null ) {

   return '<li>' .$content. '</li>';
}
add_shortcode('list', 'md_list');
add_shortcode('li', 'md_list_li');

/*Button
/*---------------------------------------------------------------------------------------------*/
function md_button( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'style'   => 'light',
		'size'	=> 'small',
		'title'	=>  $content,
		'type' => ''
    ), $atts));
	
	if($style =='readmore'){
	   return '<a href="'. $url.'" target="'.$target.'" class="read-more" title="'.$title.'">'.$content.'</a>';
	}
	elseif($style =='button'){
	   return '<a href="'. $url.'" target="'.$target.'" class="button '.$size.'" title="'.$title.'">'.$content.'</a>';
	}
	elseif($style =='primary'){
	   return '<a href="'. $url.'" target="'.$target.'" class="maxx-primary-button '.$size.'" title="'.$title.'">'.$content.'</a>';
	}
	else{
		return '<a class="md-button '.$size.' '.$type.' '.$style.'" target="'.$target.'" href="'.$url.'" title="'.$title.'">' .do_shortcode($content). '</a>';
	}
}

add_shortcode('button', 'md_button');



/*Notification Boxes
/*---------------------------------------------------------------------------------------------*/
function md_notification( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'style'   => 'light',
		'close' => 'true'
    ), $atts));
	
	if($close != 'true'){
		return '<div class="md-notification '.$style.'">' . $content . '</div>';
		
		
	}else {return '<div class="md-notification '.$style.'">' . $content . '<a href="#" class="close" title="Close this">Close</a></div>';}
}

add_shortcode('notification', 'md_notification');


/*Border frame
/*---------------------------------------------------------------------------------------------*/
function md_border_frame( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'padding' => '5',
		'align' => ''
    ), $atts));
	
	return '<div class="border-frame '.$align.'" style="padding:'.$padding.'px;">'.do_shortcode($content).'</div>';
		
}

add_shortcode('border', 'md_border_frame');

/*Image light box
/*---------------------------------------------------------------------------------------------*/
function md_image_light_box( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'width' => '',
		'height' => '',
		'title' => '',
		'original' => '',
		'align' => 'center'
		
    ), $atts));
	if($original == ''){
		return '<a href="'.$content.'" title="'.$title.'" rel="prettyPhoto" class="'.$align.' img-border image-preview"><img alt="'.$title.'" src="'.$content.'" ></a>';
	}else{
		return '<a href="'.$original.'" title="'.$title.'" rel="prettyPhoto" class="'.$align.' img-border image-preview"><img alt="'.$title.'" src="'.$content.'"></a>';
	}
}

add_shortcode('lightbox', 'md_image_light_box');


/*Icon Boxes
/*---------------------------------------------------------------------------------------------*/
function md_icon_box( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'icon'   => '',
		'title' => 'Your Title',
		'heading' => 'h4'
    ), $atts));
	
	return '<div class="icon-boxes-wrapper"><div class="icon-icon"><img src="'.$icon.'"></div><div class="icon-content"><'.$heading.' class="icon-header">' . $title . '</'.$heading.'>' . do_shortcode($content) . '</div></div>';
}

add_shortcode('iconbox', 'md_icon_box');

/*Icon Boxes
/*---------------------------------------------------------------------------------------------*/
function md_icon_box2( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'icon'   => '',
		'title' => 'Your Title',
		'description' => ''
    ), $atts));
	
	return '<div class="icon-boxes-wrapper2">
	<div class="icon-header">
		<div class="icon-icon"><img src="'.$icon.'"></div><div><h4 class="first-word icon-heading">'.$title. '</h4>'.$description.'</div></div><div class="icon-content">'. do_shortcode($content) .'</div></div>';
}

add_shortcode('iconbox2', 'md_icon_box2');


/*Accordion, toggles, tabs
/*---------------------------------------------------------------------------------------------*/
function md_accordion_container( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'type' => 'accordion'
    ), $atts));
	
	return '<dl class="m-simple-' . $type . '">'. do_shortcode($content) . '</dl>';
}
function md_accordion( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'title' => 'Your heading'
    ), $atts));
	
	return '<dt><span>' . $title . '</span></dt><dd><div>'. do_shortcode($content) . '</div></dd>';
}


add_shortcode('att_container', 'md_accordion_container');
add_shortcode('att_element', 'md_accordion');

/*Table
/*---------------------------------------------------------------------------------------------*/
function md_table( $atts, $content = null ) {	
	return '<table width="100%" class="m-table">'. do_shortcode($content) . '</table>';
}
function md_table_thead( $atts, $content = null ) {
	return '<thead>'. do_shortcode($content) . '</thead>';
}
function md_table_tbody( $atts, $content = null ) {
	return '<tbody>'. do_shortcode($content) . '</tbody>';
}
function md_table_tr( $atts, $content = null ) {
	return '<tr>'. do_shortcode($content) . '</tr>';
}
function md_table_th( $atts, $content = null ) {
	return '<th>'. do_shortcode($content) . '</th>';
}
function md_table_td( $atts, $content = null ) {
	return '<td>'. do_shortcode($content) . '</td>';
}
add_shortcode('table', 'md_table');
add_shortcode('thead', 'md_table_thead');
add_shortcode('tbody', 'md_table_tbody');
add_shortcode('tr', 'md_table_tr');
add_shortcode('th', 'md_table_th');
add_shortcode('td', 'md_table_td');


/* Google Maps Shortcode
/*-----------------------------------------------------------------------------------*/

function md_googlemap($atts, $content = null) {
	wp_enqueue_script('md-gmap-api-js');
	wp_enqueue_script('md-jgmap-js');
	extract(shortcode_atts(array(
		'height' => '250',
		'maptype' => 'ROADMAP',//HYBRID, TERRAIN, SATELLITE, ROADMAP
		'address' => '',
		'controls' => 'true',
		'marker' => 'true',
		'zoom' => 10,
		'latitude' => 0,
		'longitude' => 0,
		'html' => 'My Hometown',
	  	'image' => '',
		'popup' => 'true'
   ), $atts));
   
   $id = rand(0,999);
   $controls_selection = '';
   $marker_selection = '';
   $image_selection = '';
   
   if($height == ''){
   		$height = 250;
   }
   if($image != ''){
	   $image_selection = 'icon: {image: "'.$image.'",iconsize: [150, 100],iconanchor: [35,110]},';
   }
   else{
	   $image_selection = '';
   }
	   
   if($controls == 'true'){
	   $controls_selection = "controls: {panControl: true,zoomControl: true,mapTypeControl: true,scaleControl: true,streetViewControl: true,overviewMapControl: true}";
   }
   else{
	   $controls_selection = 'controls:false';
   }
   
   if($marker == 'true'){
	   $marker_selection = ',markers:[{'.$image_selection.'latitude: '.$latitude.',longitude: '.$longitude.',address: "'.$address.'",html: "'.$html.'",popup: '.$popup.'}]';
   }
   else{
	   $marker_selection = '';
   }
   
	$str='';
	$str .='<script type="text/javascript">';
		$str .='jQuery(document).ready(function($){';
			$str .='$("#md_google_map_'.$id.'").gMap({';
			$str .='latitude: '.$latitude;
			$str .=',maptype:"'.$maptype.'"';
			$str .=',longitude: '.$longitude;
			$str .=',address: "'.$address;
			$str .='",zoom: '.$zoom;
			$str .=','.$controls_selection;
			$str .=$marker_selection;
			$str .='});';
		$str .='});';
	$str .='</script>';
	$str .='<div id="md_google_map_'.$id.'" class="md-google-map" style="width:100%;height:'.$height.'px"></div>';
	
	return $str;
}

add_shortcode('gmap', 'md_googlemap');


/* Slider Shortcode
/*-----------------------------------------------------------------------------------*/

function md_slider_container( $atts, $content = null ) {
	
	extract(shortcode_atts(array(

		'effect' => 'slide',
		'direction' => 'horizontal'
    ), $atts));
	$id = rand(0,999);
	
	$str ='';
	$str .='<script type="text/javascript">';
	$str .='jQuery(window).load(function(){';
		$str .='jQuery("#flexslider-'.$id.'.flexslider").flexslider({';
			$str .='animation: "'.$effect.'",';
			$str .='direction: "'.$direction.'",'; 
			$str .='slideshow: true,';
			$str .='controlNav: false,';
			$str .='slideshowSpeed: 5000,';
			$str .='pauseOnAction:false,';
			$str .='pauseOnHover: true';
		$str .='});';
	$str .='});';
	$str .='</script>';	
	$str .='<div class="flexslider flexslider-shortcode" id="flexslider-'.$id.'"><ul class="slides">'. do_shortcode($content) . '</ul></div>';
	return $str;
}

function md_slider_slide( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'text' => '',
		'original' => ''
    ), $atts));
	$html = '';
	$id = rand(0,999);
	if($text == ''){
		$html = $original ? '<li><a href="'.$original.'" rel="prettyPhoto" title="'.$text.'"><img src="'.$content.'" alt="'.$text.'"></a></li>' : '<li><img src="'.$content.'" alt="'.$text.'"></li>';
	}
	else{
		$html = $original ? '<li><a href="'.$original.'" rel="prettyPhoto" title="'.$text.'"><img src="'.$content.'" alt="'.$text.'"><p class="flex-caption">'.$text.'</p></a></li>' : '<li><img src="'.$content.'" alt="'.$text.'"><p class="flex-caption">'.$text.'</p></li>';
	}
	
	return $html;
}
add_shortcode('slider', 'md_slider_container');
add_shortcode('slide', 'md_slider_slide');

/* Testimonial
/*-----------------------------------------------------------------------------------*/

function md_testimonial_container( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'effect' => 'slide',
		'direction' => 'horizontal'
    ), $atts));
	$id = rand(0,999);
	
	$str ='';
	$str .='<script type="text/javascript">';
	$str .='jQuery(window).load(function() {';
		$str .='jQuery("#testimonial-slider-'.$id.'.flexslider").flexslider({';
			$str .='animation: "'.$effect.'",';
			$str .='slideshow: true,animationLoop: true,';
			$str .='controlNav: true,';
			$str .='directionNav: false,';
			$str .='slideshowSpeed: 5000,';
			$str .='pauseOnAction:false,';
			$str .='pauseOnHover: true,smoothHeight: true';
	$str .='})});';
	$str .='</script>';	
	$str .= '<div style="" class="flexslider" id="testimonial-slider-'.$id.'"><ul class="slides">'. do_shortcode($content) . '</ul></div>';
	return $str;
}

function md_testimonial_slide( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'name' => '',
		'position' => ''
    ), $atts));
	
	return '<li><p><span class="quote"></span>'. do_shortcode($content) .'</p><p style="float:right"><strong>'.$name.'</strong> - <em style="padding-right:5px;">'.$position.'</em></p></li>';
}
add_shortcode('testimonial_container', 'md_testimonial_container');
add_shortcode('testimonial', 'md_testimonial_slide');



/* Contact form Shortcode
/*-----------------------------------------------------------------------------------*/
/*

Optional arguments:
 - email: The e-mail address to which the form will send
 - subject: The subject of the e-mail (defaults to "Message via the contact form".
 - button_text: Optionally change the text of the "submit" button.

 - Advanced form fields functionality, for creating dynamic form fields:
 --- Text Input: text_fieldname="Text Field Label|Optional Default Text"
 --- Select Box: select_fieldname="Select Box Label|key=value,key=value,key=value"
 --- Textarea Input: textarea_fieldname="Textarea Field Label|Optional Default Text|Optional Number of Rows|Optional Number of Columns"
 --- Checkbox Input: checkbox_fieldname="Checkbox Field Label|Value of the Checkbox|Checked By Default"
 --- Radio Button Input: radio_fieldname="Radio Field Label|key=value,key=value,key=value|Optional Default Value"

*/

function md_shortcode_contactform ( $atts, $content = null ) {
		
		global $data;
		
		$defaults = array(
						'email' => $data['md_contact_form_email'],
						'subject' => __( 'Message via the contact form', 'framework' ),
						'button_text' => __( 'Send message', 'framework' ), 
						'show_default_fields' => 'yes'
						);

		extract( shortcode_atts( $defaults, $atts ) );
		
		
		
					
		// Extract the dynamic fields as well, if they don't have a value in $defaults.
		if($email == ''){
			$email = $data['md_contact_form_email'];
		}
		$html = '';
		$dynamic_atts = array();
		$formatted_dynamic_atts = array();
		$error_messages = array();

		if ( is_array( $atts ) ) {

			foreach ( $atts as $k => $v ) {

				${$k} = $v;

				$dynamic_atts[$k] = ${$k};

			} // End FOREACH Loop

		} // End IF Statement

		// Parse dynamic fields.

		if ( count( $dynamic_atts ) ) {

			foreach ( $dynamic_atts as $k => $v ) {

				/* Parse the radio buttons.
				--------------------------------------------------*/

				if ( substr( $k, 0, 6 ) == 'radio_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The options.
					if ( array_key_exists( 1, $params ) ) { $options_string = $params[1]; } else { $options_string = ''; } // End IF Statement

					// The default value.
					if ( array_key_exists( 2, $params ) ) { $default_value = $params[2]; } else { $default_value = ''; } // End IF Statement

					// Format the options.
					$options = array();

					if ( $options_string ) {

						$options_raw = explode( ',', $options_string );

						if ( count( $options_raw ) ) {

							foreach ( $options_raw as $o ) {

								$o = trim( $o );

								$is_formatted = strpos( $o, '=' );

								// It's not formatted how we'd like it, so just add the value is both the value and label.
								if ( $is_formatted === false ) {

									$options[$o] = $o;

								// That's more like it. A separate value and label.
								} else {

									$option_data = explode( '=', $o );

									$options[$option_data[0]] = $option_data[1];

								} // End IF Statement

							} // End FOREACH Loop

						} // End IF Statement

					} // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'options' => $options, 'default_value' => $default_value );

				} // End IF Statement

				/* Parse the radio buttons.
				--------------------------------------------------*/

				if ( substr( $k, 0, 6 ) == 'radio_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The options.
					if ( array_key_exists( 1, $params ) ) { $options_string = $params[1]; } else { $options_string = ''; } // End IF Statement

					// The default value.
					if ( array_key_exists( 2, $params ) ) { $default_value = $params[2]; } else { $default_value = ''; } // End IF Statement

					// Format the options.
					$options = array();

					if ( $options_string ) {

						$options_raw = explode( ',', $options_string );

						if ( count( $options_raw ) ) {

							foreach ( $options_raw as $o ) {

								$o = trim( $o );

								$is_formatted = strpos( $o, '=' );

								// It's not formatted how we'd like it, so just add the value is both the value and label.
								if ( $is_formatted === false ) {

									$options[$o] = $o;

								// That's more like it. A separate value and label.
								} else {

									$option_data = explode( '=', $o );

									$options[$option_data[0]] = $option_data[1];

								} // End IF Statement

							} // End FOREACH Loop

						} // End IF Statement

					} // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'options' => $options, 'default_value' => $default_value );

				} // End IF Statement

				/* Parse the checkbox inputs.
				--------------------------------------------------*/

				if ( substr( $k, 0, 9 ) == 'checkbox_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The value of the checkbox.
					if ( array_key_exists( 1, $params ) ) { $value = $params[1]; } else { $value = ''; } // End IF Statement

					// Checked by default?
					if ( array_key_exists( 1, $params ) ) { $checked = $params[2]; } else { $checked = ''; } // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'value' => $value, 'checked' => $checked );

				} // End IF Statement

				/* Parse the text inputs.
				--------------------------------------------------*/

				if ( substr( $k, 0, 5 ) == 'text_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The default text.
					if ( array_key_exists( 1, $params ) ) { $default_text = $params[1]; } else { $default_text = ''; } // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'default_text' => $default_text );

				} // End IF Statement

				/* Parse the select boxes.
				--------------------------------------------------*/

				if ( substr( $k, 0, 7 ) == 'select_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The options.
					if ( array_key_exists( 1, $params ) ) { $options_string = $params[1]; } else { $options_string = ''; } // End IF Statement

					// Format the options.
					$options = array();

					if ( $options_string ) {

						$options_raw = explode( ',', $options_string );

						if ( count( $options_raw ) ) {

							foreach ( $options_raw as $o ) {

								$o = trim( $o );

								$is_formatted = strpos( $o, '=' );

								// It's not formatted how we'd like it, so just add the value is both the value and label.
								if ( $is_formatted === false ) {

									$options[$o] = $o;

								// That's more like it. A separate value and label.
								} else {

									$option_data = explode( '=', $o );

									$options[$option_data[0]] = $option_data[1];

								} // End IF Statement

							} // End FOREACH Loop

						} // End IF Statement

					} // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'options' => $options );

				} // End IF Statement

				/* Parse the textarea inputs.
				--------------------------------------------------*/

				if ( substr( $k, 0, 9 ) == 'textarea_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The default text.
					if ( array_key_exists( 1, $params ) ) { $default_text = $params[1]; } else { $default_text = ''; } // End IF Statement

					// The number of rows.
					if ( array_key_exists( 2, $params ) ) { $number_of_rows = $params[2]; } else { $number_of_rows = 10; } // End IF Statement

					// The number of columns.
					if ( array_key_exists( 3, $params ) ) { $number_of_columns = $params[3]; } else { $number_of_columns = 10; } // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'default_text' => $default_text, 'number_of_rows' => $number_of_rows, 'number_of_columns' => $number_of_columns );

				} // End IF Statement

			} // End FOREACH Loop

		} // End IF Statement

		/*--------------------------------------------------
		 * Form Processing.
		 *
		 * Here is where we validate the POST'ed data and
		 * format it for sending in an e-mail.
		 *
		 * We then send the e-mail and notify the user.
		--------------------------------------------------*/

		$emailSent = false;

		if ( ( count( $_POST ) > 2 ) && isset( $_POST['submitted'] ) ) {

			$fields_to_skip = array( 'checking', 'submitted');
			$default_fields = array( 'contactName' => '', 'contactEmail' => '', 'contactMessage' => '' );
			$error_responses = array(
									'contactName' => __( 'Please enter your name', 'framework' ),
									'contactEmail' => __( 'Please enter your email address (and please make sure it\'s valid)', 'framework' ),
									'contactMessage' => __( 'Please enter your message', 'framework' )
									);

			$posted_data = $_POST;

			// Check if we're using the default fields.
			if ( $show_default_fields != 'no' ) {
				// Check for errors.
				foreach ( array_keys( $default_fields ) as $d ) {
					if ( !isset ( $_POST[$d] ) || $_POST[$d] == '' || ( $d == 'contactEmail' && ! is_email( $_POST[$d] ) ) ) {
						$error_messages[$d] = $error_responses[$d];
					} // End IF Statement
				} // End FOREACH Loop
			} else {
				$default_fields = array( 'contactName' => get_bloginfo( 'name' ), 'contactEmail' => get_bloginfo( 'admin_email' ), 'contactMessage' => '' );
			}

			// If we have errors, don't do anything. Otherwise, run the processing code.

			if ( count( $error_messages ) ) {} else {
				// Setup e-mail variables.
				$message_fromname = $default_fields['contactName'];
				$message_fromemail = strtolower( $default_fields['contactEmail'] );
				$message_subject = $subject;
				$message_body = $default_fields['contactMessage'] . "\n\r\n\r";

				// Filter out skipped fields and assign default fields.
				foreach ( $posted_data as $k => $v ) {
					if ( in_array( $k, $fields_to_skip ) ) {
						unset( $posted_data[$k] );
					} // End IF Statement

					if ( in_array( $k, array_keys( $default_fields ) ) ) {
						$default_fields[$k] = $v;

						unset( $posted_data[$k] );
					} // End IF Statement
				} // End FOREACH Loop

				// Okay, so now we're left with only the dynamic fields. Assign to a fresh variable.
				$dynamic_fields = $posted_data;

				// Format the default fields into the $message_body.

				foreach ( $default_fields as $k => $v ) {
					if ( $v == '' ) {} else {
						$message_body .= str_replace( 'contact', '', $k ) . ': ' . $v . "\n\r";
					} // End IF Statement
				} // End FOREACH Loop

				// Format the dynamic fields into the $message_body.

				foreach ( $dynamic_fields as $k => $v ) {
					if ( $v == '' ) {} else {
						$value = '';

						if ( substr( $k, 0, 7 ) == 'select_' || substr( $k, 0, 6 ) == 'radio_' ) {
							$message_body .= $formatted_dynamic_atts[$k]['label'] . ': ' . $formatted_dynamic_atts[$k]['options'][$v] . "\n\r";
						} else {
							$message_body .= $formatted_dynamic_atts[$k]['label'] . ': ' . $v . "\n\r";
						} // End IF Statement
					} // End IF Statement
				} // End FOREACH Loop

				// Send the e-mail.
				$headers = __( 'From: ', 'framework') . $default_fields['contactName'] . ' <' . $default_fields['contactEmail'] . '>' . "\r\n" . __( 'Reply-To: ', 'framework' ) . $default_fields['contactEmail'];

				$emailSent = wp_mail($email, $subject, $message_body, $headers);

				
			} // End IF Statement ( count( $error_messages ) )

		} // End IF Statement

		/* Generate the form HTML.
		--------------------------------------------------*/

		$html .= '<div class="post contact-form">' . "\n";

		/* Display message HTML if necessary.
		--------------------------------------------------*/
		
		$id = rand(0,999);
		// Success messages
		if( isset( $emailSent ) && $emailSent == true ) {
			$html .= _e( 'Your email was successfully sent.', 'framework' );
			$html .= '<span class="has_sent hide"></span>' . "\n";
		}

		// Error messages
		if( count( $error_messages ) ) {
			$html .= _e( 'There were one or more errors while submitting the form.', 'framework' ) ;
		}

        // No e-mail address supplied.
        if( $email == '' ) {
			$html .= _e( 'E-mail has not been setup properly. Please add your contact e-mail!', 'framework' );
		}

		if ( $email == '' ) {} else {
			$html .= '<form action="" class="contact-form" id="contact-form-'.$id.'" method="post">' . "\n";
				$html .= '<ul class="widget-contact"><fieldset class="forms">' . "\n";

			/* Parse the "static" form fields.
			--------------------------------------------------*/
			if ( $show_default_fields != 'no' ) {
				$contactName = '';
				if( isset( $_POST['contactName'] ) ) { $contactName = $_POST['contactName']; }

				$contactEmail = '';
				if( isset( $_POST['contactEmail'] ) ) { $contactEmail = $_POST['contactEmail']; }

				$contactMessage = '';
				if( isset( $_POST['contactMessage'] ) ) { $contactMessage = stripslashes( $_POST['contactMessage'] ); }

				$html .= '<li><label for="contactName">' . __( 'Name', 'framework' ) . '</label>' . "\n";
				$html .= '<input type="text" name="contactName" id="contactName" value="' . esc_attr( $contactName ) . '" class="txt requiredField" />' . "\n";

				if( array_key_exists( 'contactName', $error_messages ) ) {
					$html .= '<span class="error">' . $error_messages['contactName'] . '</span>' . "\n";
				}

				$html .= '</li>' . "\n";

				$html .= '<li><label for="contactEmail">' . __( 'Email', 'framework' ) . '</label>' . "\n";
				$html .= '<input type="text" name="contactEmail" id="contactEmail" value="' . esc_attr( $contactEmail ) . '" class="txt requiredField email" />' . "\n";

				if( array_key_exists( 'contactEmail', $error_messages ) ) {
					$html .= '<span class="error">' . $error_messages['contactEmail'] . '</span>' . "\n";
				}

				$html .= '</li>' . "\n";

				$html .= '<li><label for="contactMessage">' . __( 'Message', 'framework' ) . '</label>' . "\n";

				$html .= '<textarea name="contactMessage" id="contactMessage" rows="10" cols="30" class="textarea requiredField">' . esc_textarea( $contactMessage ) . '</textarea>' . "\n";

				if( array_key_exists( 'contactMessage', $error_messages ) ) {
					$html .= '<span class="error">' . $error_messages['contactMessage'] . '</span>' . "\n";
				}

				$html .= '</li>' . "\n";
				
				?>
                <script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('form#contact-form-<?php echo $id;?>').submit(function() {
						jQuery('form#contact-form-<?php echo $id;?> .error').remove();
						var hasError = false;
						jQuery('form#contact-form-<?php echo $id;?> .requiredField').each(function() {
							if(jQuery.trim(jQuery(this).val()) == '') {
								var labelText = jQuery(this).prev().text();
								jQuery(this).parent().append('<div class="clear"></div><span class="error"><?php _e('You forgot to enter your', 'framework'); ?> '+labelText+'</span>');
								jQuery(this).addClass('inputError');
								hasError = true;
							} else if(jQuery(this).hasClass('email')) {
								var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
								if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
									var labelText = jQuery(this).prev().text();
									jQuery(this).parent().append('<div class="clear"></div><span class="error"><?php _e('You entered an invalid', 'framework'); ?> '+labelText+'</span>');
									jQuery(this).addClass('inputError');
									hasError = true;
								}
							}
						});
						if(!hasError) {
							var formInput = jQuery(this).serialize();
							jQuery.post(jQuery(this).attr('action'),formInput, function(data){
								jQuery('form#contact-form-<?php echo $id;?>').slideUp("fast", function() {				   
									jQuery(this).before('<?php _e('Your email was successfully sent.', 'framework');  ?>');
								});
							});
						}
						
						return false;
						
					});
				});
				</script>
                <?php
			} // End static fields check

			/* Parse dynamic fields into HTML.
			--------------------------------------------------*/

			if ( count( $formatted_dynamic_atts ) ) {

				foreach ( $formatted_dynamic_atts as $k => $v ) {

					/* Parse the radio buttons.
					--------------------------------------------------*/

					if ( substr( $k, 0, 6 ) == 'radio_' ) {
						/* Generate Select Box Field HTML.
						----------------------------------------------*/

						${$k} = $v['default_value'];
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$html .= '<p><label for="' . $k . '">' . $v['label'] . '</label>' . "\n";

							$html .= '<span class="md-radio-container fl">' . "\n";

							foreach ( $v['options'] as $value => $label ) {
								$html .= '<input type="radio" name="' . $k . '" class="radio-button md-input-radio" value="' . $value . '"' . checked( $value, ${$k}, false ) . ' />&nbsp;' . $label . '<br />' . "\n";
							}

							$html .= '</span><!--/.md-radio-container-->' . "\n";
					}

					/* Parse the checkbox inputs.
					--------------------------------------------------*/

					if ( substr( $k, 0, 9 ) == 'checkbox_' ) {
						/* Generate Checkbox Input Field HTML.
						----------------------------------------------*/

						${$k} = $v['value'];
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$checked = 0;
						if ( array_key_exists( 'checked', $v ) && $v['checked'] == 'yes' ) { $checked = ${$k}; }

						$html .= '<p class="inline">' . "\n";
						$html .= '<input type="checkbox" value="' . ${$k} . '" name="' . $k . '" id="' . $k . '" class="checkbox input-checkbox md-input-checkbox"' . checked( $checked, ${$k}, false ) . ' />' . "\n";
						$html .= '<label for="' . $k . '">' . $v['label'] . '</label></p>' . "\n";
					}

					/* Parse the text inputs.
					--------------------------------------------------*/

					if ( substr( $k, 0, 5 ) == 'text_' ) {
						/* Generate Text Input Field HTML.
						----------------------------------------------*/

						${$k} = $v['default_text'];
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$html .= '<p><label for="' . $k . '">' . $v['label'] . '</label>' . "\n";
						$html .= '<input type="text" value="' . esc_attr( ${$k} ) . '" name="' . $k . '" id="' . $k . '" class="txt input-text textfield md-input-text" /></p>' . "\n";
					}

					/* Parse the select boxes.
					--------------------------------------------------*/

					if ( substr( $k, 0, 7 ) == 'select_' ) {
						/* Generate Select Box Field HTML.
						----------------------------------------------*/

						${$k} = '';
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$html .= '<p><label for="' . $k . '">' . $v['label'] . '</label>' . "\n";
						$html .= '<select name="' . $k . '" id="' . $k . '" class="select selectfield md-select">' . "\n";

							foreach ( $v['options'] as $value => $label ) {
								$selected = '';
								if ( $value == ${$k} ) { $selected = ' selected="selected"'; } // End IF Statement

								$html .= '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>' . "\n";
							}

						$html .= '</select></p>' . "\n";
					}

					/* Parse the textarea inputs.
					--------------------------------------------------*/

					if ( substr( $k, 0, 9 ) == 'textarea_' ) {
						/* Generate Textarea Input Field HTML.
						----------------------------------------------*/

						${$k} = $v['default_text'];
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$html .= '<p><label for="' . $k . '">' . $v['label'] . '</label>' . "\n";
						$html .= '<textarea rows="' . $v['number_of_rows'] . '" cols="' . $v['number_of_columns'] . '" name="' . $k . '" id="' . $k . '" class="input-textarea textarea md-textarea">' . $v['default_text'] . '</textarea></p>' . "\n";

					}
				} // End FOREACH Loop
			} // End IF Statement

			/* The end of the form.
			----------------------------------------------*/



			$checking = '';
			if(isset($_POST['checking'])) {
				$checking = $_POST['checking'];
			}

			$html .= '<li style="display:none !important"><p class="screenReader"><label for="checking" class="screenReader">' . __('If you want to submit this form, do not enter anything in this field', 'framework') . '</label><input type="text" name="checking" id="checking" class="screenReader" value="' . esc_attr( $checking ) . '" /></p></li>' ;
			$html .= '<p class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><input class="submit button" type="submit" value="' . $button_text . '" /></p>';
				$html .= '</fieldset>' . "\n";
			$html .= '</form>' . "\n";
			$html .= '</div><!--/.post .contact-form-->' . "\n";
			$html .= '<div class="fix"></div>' . "\n";
		} // End IF Statement ( $email == '' )

		return $html;
} // End md_shortcode_contactform()

add_shortcode( 'contact_form', 'md_shortcode_contactform' );




/*Double color H4
/*---------------------------------------------------------------------------------------------*/

function md_video( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'height' => '300',
		'type' => 'youtube',
		'id' => ''
	),$atts));
	
	if($height == ''){
		$height = '300';
	}
	if($type == 'youtube'){
		return '<iframe class="video-shortcode" width="100%" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
	}
	else{
		return '<iframe class="video-shortcode" src="http://player.vimeo.com/video/'.$id.'" width="100%" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}
}
add_shortcode('video', 'md_video');


/*Latest/ Recent post
/*---------------------------------------------------------------------------------------------*/

function md_recent_popular_post( $atts, $content = null ) {
	
	
	extract(shortcode_atts(array(
		'type' => 'popular',
		'category' => '',
		'postcount' => '3',
		'width' => '100',
		'height' => '70',
		'thumb' => 'show',
		'excerpt' => 'hide',
		'excerptlength' => '20'
		
		
	),$atts));
	
	if($postcount ==''){
		$postcount = 3;
	}
	
	
	//check type of post
	$posts_query = '';
	
	if($type == 'popular'){
		$posts_query = 'numberposts='.$postcount.'&orderby=comment_count&category='.$category;
	}
	else{
		$posts_query = 'numberposts='.$postcount.'&category='.$category;
	}
	
	//image dimension
	$i_w ='100';
	$i_h ='70';	
	if($width != ''){
		$i_w = $width;
	}
	if($height != ''){
		$i_h = $height;
	}
	
	if($excerpt ==''){
		$excerpt = 'hide';
	}
	
	$str = '';
	$str .= '<ul class="sp-list list-news">';
	global $post;
	$myposts = get_posts($posts_query);	
		foreach($myposts as $post) : setup_postdata($post);
		$str .= '<li>';
			if($thumb =='show'){
				$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ));
				if(has_post_thumbnail()){
					$str.='<a href="'.get_permalink().'" class="img-border alignleft">';
					$str.='<img src="'.get_template_directory_uri().'/functions/thumb.php?src=' . $thumbnail[0].'&w='.$i_w.'&h='.$i_h.'" alt="'.get_the_title().'">';
					$str.='</a>';
				}

			}
				$str.='<p><strong><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></strong><em> - '.get_the_time("F jS, Y").' - '.get_the_time('g:i a').'</em></p>';
				if($excerpt == 'show'){$str.= excerpt($excerptlength);}
			$str.='</li>';
		endforeach;
	$str.='</ul>';
	
	return $str;
}
add_shortcode('posts', 'md_recent_popular_post');


/*Recent portfolio
/*---------------------------------------------------------------------------------------------*/

function md_recent_portfolio_carousel( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'columns' => '3',
		'count' => '',
		'itemmargin' => '38',
		'order' => 'DESC',
		'speed' => '5000',
		'thumbheight' => '',
		'tax' => ''
	),$atts));
	
	$portfolioTax = explode(",", str_replace(' ','',$tax));

	//dimension
	$i_w = 282;
	$i_h = 150;
	if($thumbheight){
		$i_h = $thumbheight;
	}
	if($columns == '3'){
		$item_width = 294;
		$heading = 'h4';
	}else{
		$item_width = 211;
		$heading = 'h5';
	}
	if($count == ''){
		$count = -1;
	}
	if($itemmargin =='')
	{
		$itemmargin ='38';
	}
	if($speed =='')
	{
		$speed ='5000';
	}
		
	
	//random id
	$id = rand(0,999);
	$str ='';	
	//begin output
	$str .= '<div id="carousel-'.$id.'" class="flexslider carousel-flexslider">';
	$str .= '<ul class="slides">';
	$i = 0;
	
	//query		
	$args = array(
		'posts_per_page' => $count,
		'order' => $order,
		'ignore_sticky_posts' => 1,
		'post_type' => 'portfolio'
		
	);
	
	
	if($tax){
		$args['tax_query'] = array(	

			array(
				'taxonomy' => 'portfolio-type',
				'field' => 'slug',
				'terms' => $portfolioTax
			)
		);
		
	}
		
	$posts_query = new WP_Query( $args );
	
	if( $posts_query->have_posts() ) : while( $posts_query->have_posts() ) : $posts_query->the_post();

		global $post;
		$post_id = $post->ID;
		
		//get the category
		$cats = array();
		
		$terms =  get_the_terms($post_id, 'portfolio-type');
		
		//$cats_link = '';
		if( is_array($terms) ) {
		foreach ( $terms as $term ) {
			$cats[] = $term->name;
			$cats_link = get_term_link($term->slug,'portfolio-type');
			
		}}
		$cat = join( ", ", $cats );
		
		/*Get the thumbnail url*/
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id,'full', true);
		
		//Get the data from custom metabox field 
		$media_type = get_post_meta($post_id, 'md_portfolio_type', true);				
		$video_type = get_post_meta($post_id, 'md_video_type', true);
		$video_embed_code_id = get_post_meta($post_id, 'md_portfolio_video_embed_code_id', true);
		$current_video_link = "";
		
		//check video type
		if($video_type == 'Vimeo'){
			$current_video_link = 'http://vimeo.com/'.$video_embed_code_id;
		}
		else{
			$current_video_link = 'http://www.youtube.com/watch?v='.$video_embed_code_id;
		}
		
		//check media type
		if(($media_type == 'video') && ($video_embed_code_id != "") ){
			$light_box = $current_video_link;
		}else{
			$light_box = $image_url[0];
		
		}
		
		$str .= '<li style="margin-right:'.$itemmargin.'px">';
		if ( has_post_thumbnail()) {
			$str .= '<a rel="prettyPhoto" href="'.$light_box.'" class="img-border align-none float-left '.$media_type.'-preview" title="'.get_the_title().'">';
			//$str .= get_the_post_thumbnail($post_id,'full');
			$str.='<img src="'.get_template_directory_uri().'/functions/thumb.php?src=' . $image_url[0].'&w='.$i_w.'&h='.$i_h.'" alt="'.get_the_title().'">';
			$str .= '</a>';
		}
		$str .= '<div class="clear"></div>';
		$str .= '<'.$heading.' class="cufon first-word"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></'.$heading.'>';
		$str .='<p>'.$cat.'</p>';
		$str .= '</li>';
	endwhile; endif; wp_reset_postdata();
	$str .= '</ul></div>';
	$str .= '<script type="text/javascript">';
		$str .= 'jQuery(window).load(function() {';
		$str .= 'jQuery("#carousel-'.$id.'.flexslider").flexslider({';
			$str .= 'animation: "slide",';
			$str .= 'animationLoop: true,';
			$str .= 'itemWidth: '.$item_width.',';
			$str .= 'controlNav: false,';
			$str .= 'itemMargin: '.$itemmargin.',';
			$str .= 'slideshowSpeed: '.$speed;
		$str .= '});';
	$str .= '});';
	$str .= '</script>';
	
	return $str;
}
add_shortcode('carousel_porfolio', 'md_recent_portfolio_carousel');



/*Pricing Table
/*---------------------------------------------------------------------------------------------*/

//table container
function md_pricing_table( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'columns' => ''
		
    ), $atts));
	$id = rand(0,999);
	
	$str = '';
	$str .= '<div id="md-pricing-table-'.$id.'" class="md-pricing-table '.$columns.'-columns">' . do_shortcode($content) . '</div>';
	$str .= '<script type="text/javascript">jQuery(document).ready(function(){jQuery("#md-pricing-table-'.$id.' ul").each(function(){jQuery("li:even",this).addClass("odd");});})</script>';
	return $str;
}
add_shortcode('pricing_table', 'md_pricing_table');

//Pricing plan
function md_pricing_table_plan( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'name' => 'Plan\'s name',
		'price' => '$0',
		'type' => 'normal',
		'period' => 'per month',
		'color' => ''
	), $atts));
	
	$plan_type = '';
	if($type != 'normal'){
		$plan_type = 'pt-featured-col';
	}
	$style = '';
	if($color != ''){
		$style = ' style="background-color:'.$color.'"';
	}
	
	$str = '';
	$str .= '<div class="pt-column '.$plan_type.'">';
		$str .= '<div class="pt-heading">';
			$str .= '<h5 '.$style.'>'.$name.'</h5>';
			$str .= '<h1 '.$style.'>';
				$str .= '<strong class="cufon">'.$price.'</strong>';
				$str .= '<span>'.$period.'</span>';
			$str .= '</h1>';
		$str .= '</div>';
		$str .= do_shortcode($content);
	$str .= '</div>';
	return $str;
}
add_shortcode('pt_plan', 'md_pricing_table_plan');

//Pricing Feature list
function md_pricing_table_features_list( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'heading' => 'Choose your plan',
		'description' => ''
	), $atts));
	
	$str = '';
	$str .= '<div class="pt-column pt-features-list">';
		$str .= '<div class="pt-heading">';
			$str .= '<h5>&nbsp;</h5>';
			$str .= '<h1>';
				$str .= '<strong class="cufon">'.$heading.'</strong>';
				$str .= '<span>'.$description.'</span>';
			$str .= '</h1>';
		$str .= '</div>';
		$str .= do_shortcode($content);
	$str .= '</div>';
	return $str;
}
add_shortcode('pt_features', 'md_pricing_table_features_list');


//Plan icon
function md_pricing_table_plan_icon_check( $atts, $content = null ) {

	return '<img src="'.get_template_directory_uri().'/images/list-tick.png">';
}
add_shortcode('pt_icon_check', 'md_pricing_table_plan_icon_check');

function md_pricing_table_plan_icon_cross( $atts, $content = null ) {

	return '<img src="'.get_template_directory_uri().'/images/list-cross.png">';
}
add_shortcode('pt_icon_cross', 'md_pricing_table_plan_icon_cross');

//Bloginfo shortcode
//http://css-tricks.com/snippets/wordpress/bloginfo-shortcode/
function digwp_bloginfo_shortcode( $atts ) {
   extract(shortcode_atts(array(
       'call' => '',
   ), $atts));
   return get_bloginfo($call);
}
add_shortcode('bloginfo', 'digwp_bloginfo_shortcode');
?>