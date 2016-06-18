<?php 

/*Custom styles
/*---------------------------------------------------------------------------------------------*/

function md_get_string_between($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}
if( !function_exists( 'md_custom_css' ) ) {

	
		function md_custom_css() {
		
		//Function Get the font style
		function md_font_style_stack($fontstyle){
			$stack = '';
		
			switch ( $fontstyle ) {
		
				case 'normal':
					$stack .= '';
				break;
				case 'italic':
					$stack .= 'font-style:italic !important;';
				break;
				case 'bold':
					$stack .= 'font-weight:bold !important;';
				break;
				case 'bold italic':
					$stack .= 'font-style:italic !important;font-weight:bold !important;';
				break;
			}
			return $stack;
		}
		
		/*Body font*/
		function md_body_font_stack($fontstyle){
			$stack = '';
		
			switch ( $fontstyle ) {
				case 'opensans':
					$stack .= '"Open Sans","Trebuchet MS", Helvetica, Arial, sans-serif';
				break;		
				case 'arial':
					$stack .= 'Arial, Helvetica, sans-serif';
				break;
				case 'verdana':
					$stack .= 'Verdana, Geneva, sans-serif';
				break;
				case 'trebuchet':
					$stack .= '"Trebuchet MS", Arial, Helvetica, sans-serif';
				break;
				case 'georgia':
					$stack .= 'Georgia, "Times New Roman", Times, serif';
				break;
				case 'times':
					$stack .= '"Times New Roman", Times, serif';
				break;
				case 'tahoma':
					$stack .= 'Tahoma, Geneva, sans-serif';
				break;
				case 'palatino':
					$stack .= '"Palatino Linotype", Palatino, Palladio, "URW Palladio L", "Book Antiqua", Baskerville, "Bookman Old Style", "Bitstream Charter", "Nimbus Roman No9 L", Garamond, "Apple Garamond", "ITC Garamond Narrow", "New Century Schoolbook", "Century Schoolbook", "Century Schoolbook L", Georgia, serif';
				break;
				case 'helvetica':
					$stack .= '"Helvetica Neue", Helvetica, Arial, sans-serif';
				break;
			}
			return $stack;
		}
		
		global $data;
		
				
		
		//assign font var
		$md_custom_google_fonts = '';
		
		//set var = avalable font from list
		$md_custom_google_fonts = $data['md_custom_google_fonts'];
		$md_custom_google_fonts = current(explode(":", $md_custom_google_fonts));
		$md_custom_google_fonts = str_replace('+',' ',$md_custom_google_fonts);
		
		//check if user active and enter a custom font.
		if($data['md_enable_choose_your_font'] && $data['md_choose_your_font']){
			$md_custom_google_fonts = $data['md_choose_your_font'];
			
		}
		
		
		$md_custom_css = '';
		
		/*body font*/
		$body_face = $data['md_body_font']['face'];
		$body_font_stack = md_body_font_stack($body_face);
		if(!empty($data['md_body_font'])) {
			//If body face = Open sans & Custom google font is not Open Sans, then load the font api,
			//Else if Custom google font is Open Sans, no need to load 2 times
			if($body_face == 'opensans' && $md_custom_google_fonts != 'Open Sans'){
				$md_custom_css .= '@import url("http://fonts.googleapis.com/css?family=Open+Sans");';
			}
			$md_custom_css .= 'body{font-size: '.$data['md_body_font']['size'].';font-family:'.$body_font_stack.';color:'.$data['md_body_font']['color'].'}
								p{font-family:'.$body_font_stack.';}';
		}
		
								
		/*Google font Font*/
		if($md_custom_google_fonts != 'none' ){
			
			$temp = 
			$md_custom_css .= 'h1,h2,h3,h4,h5,h6,h1 *,h2 *,h3 *,h4 *,h5 *,h6 *{font-family: "'.$md_custom_google_fonts.'" !important;}';
		}
		
		
		
		/*h1, h2, h3, h4, h5, h6*/
		
		for ($i = 1; $i < 7; $i++){ 		
			$heading_font_style = $data['md_h'.$i]['style'];
			$font_style_stack = md_font_style_stack($heading_font_style);
			
			$md_custom_css .= 'h'.$i.'{
				font-size: 	'.$data['md_h'.$i]['size'].';'. 
				$font_style_stack.'
				line-height:	'.$data['md_h'.$i]['height'].' !important;
				letter-spacing:	'.$data['md_h'.$i]['letterspacing'].' !important;
				margin-bottom:	'.$data['md_h'.$i]['marginbottom'].';
			}';
			
		}
		
		
		//Disable border radius
		if($data['md_disable_border_radius']) {
			$md_custom_css .= '*{
				border-radius:0 !important;
				-moz-border-radius:0 !important;
				-webkit-border-radius:0 !important;
			}';
		}

		
		
		/*Top border style*/
		if(!empty($data['md_top_border'])) {
			
			$md_custom_css .= '#header{border-top: '.$data['md_top_border']['width'].'px '.$data['md_top_border']['style'].' '.$data['md_top_border']['color'].';}';
		}
		
		/*Top abstract background*/
		if($data['md_hide_abstract_background']) {
			$md_custom_css .= '#top-wrapper{background:none}';
		}
		/*Content background color*/
		if(!empty($data['md_content_background_color'])) {
			$md_custom_css .= '#wrap-all{background-color: '.$data['md_content_background_color'].';}';
		}
		
		
		/*Content background pattern*/
		if($data['md_enable_content_background_pattern']){
			if(!empty($data['md_content_background_pattern'])) {
				$md_custom_css .= '#wrap-all{background-image: url('.$data['md_content_background_pattern'].');
										background-repeat:repeat;
									}';
			}
		}
		
		if($data['md_enable_body_background_image']){
			$md_custom_css .= 'body{';
		/*body background */
			if(!empty($data['md_body_background_color'])) {
				$md_custom_css .= 'background-color: '.$data['md_body_background_color'].';';
			}
			if(!empty($data['md_body_background_image'])) {
				$md_custom_css .= 'background-image: url('.$data['md_body_background_image'].');';
			}
			
			$md_custom_css .= 'background-position: '.$data['md_body_background_image_position'].';';
				
			
			$md_custom_css .= 'background-repeat: '.$data['md_body_background_image_repeat'].';';
			
			$md_custom_css .= 'background-attachment: '.$data['md_body_background_image_attachment'].';';
			
			$md_custom_css .= 'background-size: '.$data['md_body_background_image_size'].';';
			
			
				
			$md_custom_css .= '}';
		}
		/*Typography*/
		
		
		
		//overlay Effect
		
		$overlay_effect_css = '';
		if($data['md_overlay_effect'] == 'Gradient Effect'){
			$overlay_effect_css = 'background-image: url('.get_template_directory_uri().'/images/button-light.png);background-position:left 0 !important;';
		}elseif($data['md_overlay_effect'] == 'No Effect'){
			$overlay_effect_css = 'background-image:none !important;';
		}else{}
		if($data['md_overlay_effect'] != 'Default'){
			$md_custom_css .= '.m-menu ul > li,#g-search button,.box_skitter_home.maxx-theme .info_slide_dots span,';
			$md_custom_css .= '.maxx-primary-button, input[type="submit"], button[type="submit"], .m-pagination a:hover, .m-pagination span.current, .maxx-primary-button:hover,';
			$md_custom_css .= 'input[type="submit"]:hover, .button:hover,#get-in-touch #via-phone-number .icon{'.$overlay_effect_css.'}';
			
		}
		
	//if no skin selected, load custom skin defined by user
	$md_custom_builtin_skins = 	$data['md_custom_builtin_skins'];
	if($md_custom_builtin_skins == 'none'){
		
		/*Top bar background color*/
		if(!empty($data['md_top_bar_background_color'])) {
			$md_custom_css .= '#top-bar-wrapper{background-color: '.$data['md_top_bar_background_color'].';}';
		}
		/*Slider background color*/
		if(!empty($data['md_slider_background_color'])) {
			$md_custom_css .= '#slider-bg-overlay > #slider-bg-overlay1{background-color: '.$data['md_slider_background_color'].';}';
		}
		/*Footer widgets background color*/
		if(!empty($data['md_footer_widget_background_color'])) {
			$md_custom_css .= '#footer-widget-wrapper{background-color: '.$data['md_footer_widget_background_color'].';}';
		}
		if($data['md_disable_footer_background_overlay']){
			$md_custom_css .= '#footer-widget-wrapper{background-image: none;}';
		}
		/*Footer copyright background color*/
		if(!empty($data['md_footer_copyright_background_color'])) {
			$md_custom_css .= '#footer-extra-wrapper{background-color: '.$data['md_footer_copyright_background_color'].';}';
		}
		/*Primary color*/
		if(!empty($data['md_primary_color'])) {
			
			$md_custom_css .= '::selection{background: '.$data['md_primary_color'].'}';
			$md_custom_css .= '::-moz-selection{background: '.$data['md_primary_color'].'}';
			$md_custom_css .= '.m-menu ul > li.current, .m-menu ul > li.current-menu-item, .m-menu ul > li.current_page_item, .m-menu ul > li.current-menu-ancestor, .m-menu ul > li.current-menu-parent,';
			$md_custom_css .='#g-search button,.box_skitter_home.maxx-theme .label_skitter,.maxx-primary-button, input[type="submit"],button[type="submit"], .m-pagination span.current,#get-in-touch #via-phone-number .icon,.drop-cap.primary,';
			$md_custom_css .='.flex-control-nav.flex-control-paging li a.flex-active,.md-pricing-table .pt-column.pt-featured-col .pt-heading h1, .md-pricing-table .pt-column.pt-featured-col .pt-heading h5{';
				$md_custom_css .='background-color: '.$data['md_primary_color'].'}';
				$md_custom_css .='.box_skitter_home.maxx-theme .info_slide_dots span.image_number_select{background-color: '.$data['md_primary_color'].' !important;} ';
			
			$md_custom_css .= 'h1.double-color strong,h2.double-color strong,h3.double-color strong,h4.double-color strong,h5.double-color strong,h6.double-color strong,#error-404 h1{color: '.$data['md_primary_color'].';}';
			$md_custom_css .= '.plain-text-logo h1,blockquote{border-color: '.$data['md_primary_color'].';}';
			$md_custom_css .= 'textarea:focus,input[type="text"]:focus,input[type="password"]:focus,input[type="search"]:focus,input[type="email"]:focus,input[type="tel"]:focus,input.input-field:focus,select:enabled:focus{';
			$md_custom_css .='border-color:'.$data['md_primary_color'].';box-shadow:0 0 5px '.$data['md_primary_color'].';-moz-box-shadow:0 0 5px '.$data['md_primary_color'].';-webkit-box-shadow:0 0 5px '.$data['md_primary_color'].';}';
		}
		
		/*Secondary color*/
		if(!empty($data['md_secondary_color'])) {
			$md_custom_css .= '.m-menu ul > li:hover,#g-search button:hover,.m-pagination a:hover, .maxx-primary-button:hover, input[type="submit"]:hover{
				background-color: '.$data['md_secondary_color'].';}';
		}
		
		/*Body content Link color*/
		if(!empty($data['md_body_link_color'])) {
			$md_custom_css .= 'a,.comment-content a,.comment-time a:hover,.comment-link-function a:hover,.required,.entry-meta ul li a:hover,.post-tags a:hover,.comment-meta cite a,.comment-meta cite,#comment-nav-below a:hover, #sidebar ul li a:hover,#main-content-wrapper ul li a:hover, #main-content-wrapper ol li a:hover,#sidebar .widget-twitter li a, #footer-widget-wrapper .widget-twitter li a:hover, #sidebar .widget ul li.current-cat > a, .link-pages a, .error, #sidebar .md-latest-portfolios-widget p a:hover, .sp-list li a:hover, #sidebar .widget_recent_comments ul li a:first-child,.m-simple-accordion dt.active span,.m-simple-toggle dt.active span,.m-simple-tabs dt.active span{
				color: '.$data['md_body_link_color'].';}';
		}
		
		/*Body content Link:hover color*/
		if(!empty($data['md_body_link_hover_color'])) {
			$md_custom_css .= '#sidebar a:hover,#sidebar a:hover strong,a:hover,.comment-content a:hover{
				color: '.$data['md_body_link_hover_color'].';}';
		}
		
		/*Footer & Top bar Link color*/
		if(!empty($data['md_footer_topbar_link_color'])) {
			$md_custom_css .= '#top-bar-wrapper strong,#top-bar-wrapper a strong,#top-bar-wrapper ul li a:hover,#top-bar-wrapper a,#footer-widget-wrapper strong,#footer-widget-wrapper a,#footer-extra-wrapper a,#footer-extra-wrapper strong{
				color: '.$data['md_footer_topbar_link_color'].';}';
		}
		
		/*Footer & Top bar Link:hover color*/
		if(!empty($data['md_footer_topbar_link_hover_color'])) {
			$md_custom_css .= '#top-bar-wrapper a:hover,#footer-widget-wrapper a:hover,#footer-extra-wrapper a:hover,#footer-widget-wrapper a:hover strong,#footer-extra-wrapper a:hover strong{
				color: '.$data['md_footer_topbar_link_hover_color'].';}';
		}
	}
		
				
		/*custom css field*/
		if(!empty($data['md_custom_css'])) {
			$md_custom_css .= $data['md_custom_css'];
		}
		
		$custom_css_output = "<!--Custom CSS-->\n <style type=\"text/css\"> \n" . $md_custom_css . " \n </style>\n<!--/Custom CSS-->";
		
		echo $custom_css_output;

	}
		
	add_action('wp_head', 'md_custom_css');
}
?>