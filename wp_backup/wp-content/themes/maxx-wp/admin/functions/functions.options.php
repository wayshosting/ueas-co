<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
//Theme Shortname
$shortname = "md";
	
//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name;
}
	
$of_pages_tmp = array_unshift($of_pages, "Select a page:"); 


$options_pages = array();
$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
$options_pages[''] = 'Select a page:';
foreach ($options_pages_obj as $page) {
	$options_pages[$page->ID] = $page->post_title;
}  

$footer_columns = array("2","3","4","5","6");
$of_options_blog_meta = array("date" => "Date of Post ","author" => "Author of the Post","category" => "Post Category","comments" => "Comments"); 

//Testing 
$of_options_select = array("one","two","three","four","five"); 
$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");

/*Slide Effect*/
$md_slide_effect = array('cube', 'cubeRandom', 'block', 'cubeStop', 'cubeHide', 'cubeSize', 'horizontal', 'showBars', 'showBarsRandom', 'tube', 'fade', 'fadeFour', 'paralell', 'blind', 'blindHeight', 'blindWidth', 'directionTop', 'directionBottom', 'directionRight', 'directionLeft', 'cubeStopRandom', 'cubeSpread', 'cubeJelly', 'glassCube', 'glassBlock', 'circles', 'circlesInside', 'circlesRotate', 'cubeShow', 'upBars', 'downBars', 'hideBars', 'swapBars', 'swapBarsBack', 'swapBlocks', 'cut', 'random', 'randomSmart'); 

/*Google font*/
$url =  ADMIN_DIR . 'assets/images/fonts/';	
$md_google_font = array(
					'none'	 			=> $url . 'f-none.jpg',
					'Amaranth:400,400italic,700,700italic' 			=> $url . 'f-amaranth.jpg',
					'Cabin:400,700,400italic,700italic' 			=> $url . 'f-cabin.jpg',
					'Cabin+Condensed:400,700' 	=> $url . 'f-cabin-condensed.jpg',
					'Crimson+Text:400,700' 		=> $url . 'f-crimson-text.jpg',
					'Dancing+Script:400,700' 	=> $url . 'f-dancing-script.jpg',
					'Droid+Serif:400,700,400italic,700italic' 		=> $url . 'f-droid-serif.jpg',
					'Droid+Sans:400,700' 		=> $url . 'f-droid-sans.jpg',
					'Lato:400,700' 				=> $url . 'f-lato.jpg',
					'Lobster+Two' 		=> $url . 'f-lobster-two.jpg',
					'Muli:400,400italic' 				=> $url . 'f-muli.jpg',
					'Nunito:400,700' 			=> $url . 'f-nunito.jpg',
					'Open+Sans:400,700' 		=> $url . 'f-open-sans.jpg',
					'Oswald' 			=> $url . 'f-oswald.jpg',
					'Pacifico' 			=> $url . 'f-pacifico.jpg',
					'PT+Sans:400,700' 			=> $url . 'f-pt-sans.jpg',
					'PT+Sans+Narrow:400,700' 	=> $url . 'f-pt-sans-narrow.jpg',
					'Quicksand:400,700' 		=> $url . 'f-quicksand.jpg',
					'Signika:400,700' 			=> $url . 'f-signika.jpg',
					'Ubuntu:400,700' 			=> $url . 'f-ubuntu.jpg',
					'Volkhov:400,700' 			=> $url . 'f-volkhov.jpg'
				); 
$url =  ADMIN_DIR . 'assets/images/skins/';			
$md_builtin_skins = array(
					'none'	 			=> $url . 'skin-none.jpg',
					'skin-brown' 		=> $url . 'skin-brown.jpg',
					'skin-green' 		=> $url . 'skin-green.jpg',
					'skin-violet' 		=> $url . 'skin-violet.jpg',
					'skin-blue' 		=> $url . 'skin-blue.jpg',
					'skin-orange' 		=> $url . 'skin-orange.jpg',
					'skin-black' 		=> $url . 'skin-black.jpg',
				); 


//Stylesheets Reader
$alt_stylesheet_path = LAYOUT_PATH;
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//Background Images Reader
$bg_images_path = get_template_directory(). '/images/bg/'; // change this to where you store your bg images
$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
$bg_images = array();

if ( is_dir($bg_images_path) ) {
    if ($bg_images_dir = opendir($bg_images_path) ) { 
        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                $bg_images[] = $bg_images_url . $bg_images_file;
            }
        }    
    }
}

/*-----------------------------------------------------------------------------------*/
/* TO DO: Add options/functions that use these */
/*-----------------------------------------------------------------------------------*/

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// Image Alignment radio box
$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();



/*General Settings*/
$of_options[] = array( "name" => __("General Settings","framework"),
                    "type" => "heading");
					
/*$of_options[] = array( "name" => "Slider Options",
					"desc" => "Unlimited slider with drag and drop sortings.",
					"id" => $shortname."_slider",
					"std" => "",
					"type" => "slider");
					
$of_options[] = array( "name" => __("Select the Page ","framework"),
					"desc" => __("this will affect to primary color elements, .","framework"),
					"id" => $shortname."_pages",
					"std" => "Default",
					"type" => "select",
					"options" => $of_pages
					);
$of_options[] = array( "name" => __("Select the categories ","framework"),
					"desc" => __("this will affect to primary color elements, .","framework"),
					"id" => $shortname."_categories",
					"std" => "Default",
					"type" => "select",
					"options" => $of_categories
					
					);*/
					
$url =  ADMIN_DIR . 'assets/images/';

						
$of_options[] = array( "name" => __("Enable Plain Text Logo","framework"),
					"desc" => __("Check this to enable a plain text logo rather than an image.","framework"),
					"id" => $shortname."_plain_logo",
					"std" => 1,
					"type" => "checkbox");					
					

$of_options[] = array( "name" => __("Custom Logo","framework"),
					"desc" => __("Upload a logo for your theme, or specify the image address of your online logo. (http://example.com/logo.png)","framework"),
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Custom Admin login logo","framework"),
					"desc" => __("Upload a custom logo for admin login page. ","framework"),
					"id" => $shortname."_custom_login_logo",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Custom Favicon","framework"),
					"desc" => __("Upload a 16px x 16px Png/Gif image that will represent your website's favicon.","framework"),
					"id" => $shortname."_favicon",
					"std" => "",
					"type" => "media"); 
					
$of_options[] = array( "name" => __("Feedburner URL","framework"),
					"desc" => __("Enter your full FeedBurner URL to replace the default feed URL by Wordpress.","framework"),
					"id" => $shortname."_feedburner",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Contact form Email","framework"),
                    "desc" => __("Enter your E-mail address to use on the Contact Form Page Template. Ex: example@email.com","framework"),
                    "id" => $shortname."_contact_form_email",
                    "std" => "",
                    "type" => "text");

$of_options[] = array( "name" => __("Header Caption","framework"),
					"desc" => __("Enter a message to display in the right of top bar","framework"),
					"id" => $shortname."_header_caption",
					"std" => 'E-mail: <a href="#">info@example.com</a> - Tel: <strong>(+00) 1234.567.890</strong>',
					"type" => "textarea"); 
					
$of_options[] = array( "name" => __("Tracking Code","framework"),
					"desc" => __("Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.","framework"),
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");    
					    
$of_options[] = array( "name" => __("404 error message.","framework"),
                    "desc" => __("This display when a user clicks on a link to a missing page.","framework"),
                    "id" => $shortname."_default_404_message",
                    "std" => "Sorry ! The page you requested could not be found<br>Try using the site search box ",
                    "type" => "textarea");

$of_options[] = array( "name" => __("Footer Text","framework"),
                    "id" => $shortname."_footer_text",
                    "std" => "© 2012 <a href=\"#\">Manh</a>. All Rights Reserved. Powered by <a href=\"#\">WordPress</a>.",
                    "type" => "textarea"); 

/*Home Settings*/

$of_options[] = array( "name" => __("Home Settings","framework"),
					"type" => "heading");
$of_options[] = array( "name" => __("Skitter Slider","framework"),
					"type" => "subheading");
				
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide-option",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Slider Options</h3>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __("Slide speed","framework"),
					"desc" => __("currently is 2500 miliseconds (2.5 seconds)","framework"),
					"id" => $shortname."_slideshow_speed",
					"std" => "2500",
					"type" => "text");

$of_options[] = array( "name" => __("AutoPlay","framework"),
					"id" => $shortname."_slide_auto_play",
					"desc" => __("Check if you want the slide to start automatically","framework"),
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => __("Slider Label","framework"),
					"id" => $shortname."_slider_label",
					"desc" => __("Check if you want to show the slider label (heading & desctiption)","framework"),
					"std" => 1,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Show preview","framework"),
					"id" => $shortname."_slide_show_preview",
					"desc" => __("Check if you want show the preview thumbnail when hover to slider bullets","framework"),
					"std" => 1,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide1",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Slide 1</h3>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => __("Image 1","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 940px x 370px. ","framework"),
					"id" => $shortname."_home_slider_img1",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 1 Title (optional)","framework"),
					"desc" => __("Enter in an optional description ","framework"),
					"id" => $shortname."_home_slider_img1_title",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __("Image 1 Description (optional)","framework"),
					"desc" => __("Enter in an optional description (HTML accepted)","framework"),
					"id" => $shortname."_home_slider_img1_desc",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __("Image 1 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_slider_img1_link",
					"std" => "",
					"type" => "text");
$of_options[] = array( "name" => __("Effect","framework"),
					"id" => $shortname."_home_slider_img1_effect",
					"std" => "random",
					"type" => "select",
					"options" => $md_slide_effect);

$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide2",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Slide 2</h3>",
					"icon" => true,
					"type" => "info");
									
$of_options[] = array( "name" => __("Image 2","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 940px x 370px. ","framework"),
					"id" => $shortname."_home_slider_img2",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 2 Title (optional)","framework"),
					"desc" => __("Enter in an optional description ","framework"),
					"id" => $shortname."_home_slider_img2_title",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __("Image 2 Description (optional)","framework"),
					"desc" => __("Enter in an optional description (HTML accepted)","framework"),
					"id" => $shortname."_home_slider_img2_desc",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __("Image 2 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_slider_img2_link",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Effect","framework"),
					"id" => $shortname."_home_slider_img2_effect",
					"std" => "random",
					"type" => "select",
					"options" => $md_slide_effect);
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide4",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Slide 3</h3>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __("Image 3","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 940px x 370px. ","framework"),
					"id" => $shortname."_home_slider_img3",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 3 Title (optional)","framework"),
					"desc" => __("Enter in an optional description ","framework"),
					"id" => $shortname."_home_slider_img3_title",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __("Image 3 Description (optional)","framework"),
					"desc" => __("Enter in an optional description (HTML accepted)","framework"),
					"id" => $shortname."_home_slider_img3_desc",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __("Image 3 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_slider_img3_link",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Effect","framework"),
					"id" => $shortname."_home_slider_img3_effect",
					"std" => "random",
					"type" => "select",
					"options" => $md_slide_effect);

$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide4",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Slide 4</h3>",
					"icon" => true,
					"type" => "info");
									
$of_options[] = array( "name" => __("Image 4","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 940px x 470px. ","framework"),
					"id" => $shortname."_home_slider_img4",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 4 Title (optional)","framework"),
					"desc" => __("Enter in an optional description ","framework"),
					"id" => $shortname."_home_slider_img4_title",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __("Image 4 Description (optional)","framework"),
					"desc" => __("Enter in an optional description (HTML accepted)","framework"),
					"id" => $shortname."_home_slider_img4_desc",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __("Image 4 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_slider_img4_link",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Effect","framework"),
					"id" => $shortname."_home_slider_img4_effect",
					"std" => "random",
					"type" => "select",
					"options" => $md_slide_effect);
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide5",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Slide 5</h3>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __("Image 5","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 950px x 570px. ","framework"),
					"id" => $shortname."_home_slider_img5",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 5 Title (optional)","framework"),
					"desc" => __("Enter in an optional description ","framework"),
					"id" => $shortname."_home_slider_img5_title",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __("Image 5 Description (optional)","framework"),
					"desc" => __("Enter in an optional description (HTML accepted)","framework"),
					"id" => $shortname."_home_slider_img5_desc",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __("Image 5 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_slider_img5_link",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Effect","framework"),
					"id" => $shortname."_home_slider_img5_effect",
					"std" => "random",
					"type" => "select",
					"options" => $md_slide_effect);
					
$of_options[] = array( "name" => __("FlexSlider","framework"),
					"type" => "subheading");
					
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide20",
					"std" => "<h3 style=\"margin: 0\">Slider Options</h3>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __("Slider Effect","framework"),
					"desc" => __("Select the animation of slider you want to use","framework"),
					"id" => $shortname."_home_flexslider_animation",
					"std" => "slide",
					"type" => "select",
					"options" => array('fade','slide')
					);
 
$of_options[] = array( "name" => __("Slideshow Speed","framework"),
					"desc" => __("Set the speed of the slideshow cycling, in milliseconds ( current: 3000)","framework"),
					"id" => $shortname."_home_flexslider_slide_speed",
					"std" => "3000",
					"type" => "text"
					);
					
$of_options[] = array( "name" => __("Animation Speed","framework"),
					"desc" => __("Set the speed of animations, in milliseconds ( current: 600)","framework"),
					"id" => $shortname."_home_flexslider_animate_speed",
					"std" => "600",
					"type" => "text"
					);
					
$of_options[] = array( "name" => __("Control Navigation style","framework"),
					"desc" => __("Select the navigation for paging control of each slide","framework"),
					"id" => $shortname."_home_flexslider_control_nav",
					"std" => "thumbnails",
					"type" => "select",
					"options" => array('thumbnails','bullets')
					);

$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide21",
					"std" => "<h3 style=\"margin: 0\">Slide 1</h3>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => __("Image 1","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 940px x 370px. ","framework"),
					"id" => $shortname."_home_flexslider_img1",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 1 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_flexslider_img1_link",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Video slide 1","framework"),
					"desc" => __("Check this to enable video slider","framework"),
					"id" => $shortname."_home_flexslider_img1_video_enable",
					"std" => "0",
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Video Source","framework"),
					"desc" => __("Choose the type of Video source.","framework"),
					"id" => $shortname."_home_flexslider_img1_video_source",
					"std" => "youtube",
					"type" => "select",
					"fold" => $shortname."_home_flexslider_img1_video_enable",
					"options" => array('youtube','vimeo')
					);
					
$of_options[] = array( "name" => __("Video Embed Code","framework"),
					"desc" => __("Paste the ID of the video is hosted on, such as Youtube and Vimeo. you want to show <br>E.g. http://www.youtube.com/watch?v=<strong>tbPhf_KXNZI</strong><br>http://vimeo.com/<strong>42614184</strong>","framework"),
					"id" => $shortname."_home_flexslider_img1_video_source_id",
					"std" => "",
					"fold" => $shortname."_home_flexslider_img1_video_enable",
					"type" => "text");

$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide22",
					"std" => "<h3>Slide 2</h3>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => __("Image 2","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 940px x 370px. ","framework"),
					"id" => $shortname."_home_flexslider_img2",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 2 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_flexslider_img2_link",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Video slide 2","framework"),
					"desc" => __("Check this to enable video slider","framework"),
					"id" => $shortname."_home_flexslider_img2_video_enable",
					"std" => "0",
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Video Source","framework"),
					"desc" => __("Choose the type of Video source.","framework"),
					"id" => $shortname."_home_flexslider_img2_video_source",
					"std" => "youtube",
					"type" => "select",
					"fold" => $shortname."_home_flexslider_img2_video_enable",
					"options" => array('youtube','vimeo')
					);
					
$of_options[] = array( "name" => __("Video Embed Code","framework"),
					"desc" => __("Paste the ID of the video is hosted on, such as Youtube and Vimeo. you want to show <br>E.g. http://www.youtube.com/watch?v=<strong>tbPhf_KXNZI</strong><br>http://vimeo.com/<strong>42614184</strong>","framework"),
					"id" => $shortname."_home_flexslider_img2_video_source_id",
					"std" => "",
					"fold" => $shortname."_home_flexslider_img2_video_enable",
					"type" => "text");
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide23",
					"std" => "<h3>Slide 3</h3>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => __("Image 3","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 940px x 370px. ","framework"),
					"id" => $shortname."_home_flexslider_img3",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 3 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_flexslider_img3_link",
					"std" => "",
					"type" => "text");
					
					
$of_options[] = array( "name" => __("Video slide 3","framework"),
					"desc" => __("Check this to enable video slider","framework"),
					"id" => $shortname."_home_flexslider_img3_video_enable",
					"std" => "0",
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Video Source","framework"),
					"desc" => __("Choose the type of Video source.","framework"),
					"id" => $shortname."_home_flexslider_img3_video_source",
					"std" => "youtube",
					"type" => "select",
					"fold" => $shortname."_home_flexslider_img3_video_enable",
					"options" => array('youtube','vimeo')
					);
					
$of_options[] = array( "name" => __("Video Embed Code","framework"),
					"desc" => __("Paste the ID of the video is hosted on, such as Youtube and Vimeo. you want to show <br>E.g. http://www.youtube.com/watch?v=<strong>tbPhf_KXNZI</strong><br>http://vimeo.com/<strong>42614184</strong>","framework"),
					"id" => $shortname."_home_flexslider_img3_video_source_id",
					"std" => "",
					"fold" => $shortname."_home_flexslider_img3_video_enable",
					"type" => "text");
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide24",
					"std" => "<h3>Slide 4</h3>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => __("Image 4","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 940px x 470px. ","framework"),
					"id" => $shortname."_home_flexslider_img4",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 4 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_flexslider_img4_link",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Video slide 4","framework"),
					"desc" => __("Check this to enable video slider","framework"),
					"id" => $shortname."_home_flexslider_img4_video_enable",
					"std" => "0",
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Video Source","framework"),
					"desc" => __("Choose the type of Video source.","framework"),
					"id" => $shortname."_home_flexslider_img4_video_source",
					"std" => "youtube",
					"type" => "select",
					"fold" => $shortname."_home_flexslider_img4_video_enable",
					"options" => array('youtube','vimeo')
					);
					
$of_options[] = array( "name" => __("Video Embed Code","framework"),
					"desc" => __("Paste the ID of the video is hosted on, such as Youtube and Vimeo. you want to show <br>E.g. http://www.youtube.com/watch?v=<strong>tbPhf_KXNZI</strong><br>http://vimeo.com/<strong>42614184</strong>","framework"),
					"id" => $shortname."_home_flexslider_img4_video_source_id",
					"std" => "",
					"fold" => $shortname."_home_flexslider_img4_video_enable",
					"type" => "text");
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-slide25",
					"std" => "<h3>Slide 5</h3>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => __("Image 5","framework"),
					"desc" => __("Upload an image to show in the slider. Dimensions: 950px x 570px. ","framework"),
					"id" => $shortname."_home_flexslider_img5",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __("Image 5 Link (optional)","framework"),
					"desc" => __("Enter in the URL you'd like to link to, or leave blank to disable linking for this image.","framework"),
					"id" => $shortname."_home_flexslider_img5_link",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Video slide 5","framework"),
					"desc" => __("Check this to enable video slider","framework"),
					"id" => $shortname."_home_flexslider_img5_video_enable",
					"std" => "0",
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Video Source","framework"),
					"desc" => __("Choose the type of Video source.","framework"),
					"id" => $shortname."_home_flexslider_img5_video_source",
					"std" => "youtube",
					"type" => "select",
					"fold" => $shortname."_home_flexslider_img5_video_enable",
					"options" => array('youtube','vimeo')
					);
					
$of_options[] = array( "name" => __("Video Embed Code","framework"),
					"desc" => __("Paste the ID of the video is hosted on, such as Youtube and Vimeo. you want to show <br>E.g. http://www.youtube.com/watch?v=<strong>tbPhf_KXNZI</strong><br>http://vimeo.com/<strong>42614184</strong>","framework"),
					"id" => $shortname."_home_flexslider_img5_video_source_id",
					"std" => "",
					"fold" => $shortname."_home_flexslider_img5_video_enable",
					"type" => "text");
				
/*Interface Settings*/
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( "name" => __("Interface Settings","framework"),
                    "type" => "heading");
					
$of_options[] = array( "name" => __("Enable Responsive","framework"),
					"desc" => __("Check this to enable Responsive","framework"),
					"id" => $shortname."_enable_responsive",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Enable Boxed-layout","framework"),
					"desc" => __("Check this to enable Boxed-layout","framework"),
					"id" => $shortname."_enable_boxed_layout",
					"std" => 0,
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Boxed-layout position","framework"),
					"desc" => __("Select the alignment","framework"),
					"id" => $shortname."_boxed_layout_position",
					"std" => "default",
					"fold" => $shortname."_enable_boxed_layout",
					"type" => "select",
					"options" => array('default','left','right')
					);
					
					
					
					
					
									
$of_options[] = array( "name" => __("Main Layout","framework"),
					"desc" => __("Select main content and sidebar alignment.","framework"),
					"id" => $shortname."_layout",
					"std" => "sidebar-right",
					"type" => "images",
					"options" => array(
						'sidebar-right' => $url . '2cr.png',
						'sidebar-left' => $url . '2cl.png')
					);

$of_options[] = array( "name" => __("Enable/Disable comment area on all pages","framework"),
					"desc" => __("unCheck this if you dont want to display comment area in all pages","framework"),
					"id" => $shortname."_disable_all_pages_comment",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Show search bar in Menu Navigation","framework"),
					"desc" => __("Check this if you like to display the search box in the Menu Navigation ","framework"),
					"id" => $shortname."_show_search_bar",
					"std" => 1,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Show Top bar menu","framework"),
					"desc" => __("Check this if you like to show the top bar menu navigation & header caption","framework"),
					"id" => $shortname."_show_top_bar",
					"std" => 0,
					"type" => "checkbox");

$of_options[] = array( "name" => __("Show Social network link","framework"),
					"desc" => __("Check this if you like to show the Social network in banner","framework"),
					"id" => $shortname."_show_social_network",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Enable Breadcrums","framework"),
					"desc" => __("Check this to enable breadcrums","framework"),
					"id" => $shortname."_show_breadcrums",
					"std" => 1,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Enable Get in touch form","framework"),
					"desc" => __("Check this to get in Touch form vie email and phone number","framework"),
					"id" => $shortname."_show_getintouch_form",
					"std" => 0,
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Get in touch form Heading","framework"),
					"id" => $shortname."_getintouch_heading",
					"std" => "We can Help You. Call Us <strong>+ 1 800 123 4567</strong>",
					"fold" => $shortname."_show_getintouch_form",
					"type" => "text");
$of_options[] = array( "name" => __("Get in touch form Subline","framework"),
					"id" => $shortname."_getintouch_subline",
					"std" => "Keep in touch with our news & receive FREE THEMES",
					"fold" => $shortname."_show_getintouch_form",
					"type" => "text");

$of_options[] = array( "name" => __("Footer Layout","framework"),
					"desc" => __("Select a footer layout style. (full, half, small)","framework"),
					"id" => $shortname."_footer_layout",
					"std" => "footer-full-layout",
					"type" => "images",
					"options" => array(
						'footer-full-layout' => $url . 'ft1.png',
						'footer-widget' => $url . 'ft2.png',
						'footer-extra' => $url . 'ft3.png')
					);	
$of_options[] = array( "name" => __("Footer Columns","framework"),
					"desc" => __("Select the number of columns you would like to display in the footer.","framework"),
					"id" => $shortname."_footer_columns",
					"std" => "3",
					"type" => "select",
					"options" => $footer_columns);
                                                         
/*Blog Settings*/
$of_options[] = array( "name" => __("Blog Settings","framework"),
					"type" => "heading");
					
$of_options[] = array( "name" => __("Default banner text","framework"),
                    "desc" => __("This text is displayed in the banner area of the default Blog page.","framework"),
                    "id" => $shortname."_default_banner_text",
                    "std" => "Blog",
                    "type" => "text");
					
$of_options[] = array( "name" => __("Enable post excerpt","framework"),
					"desc" => __("Check this if you want to display the post excerpt only in blog page","framework"),
					"id" => $shortname."_enable_post_excerpt",
					"std" => 0,
					"folds" => "0",
					"type" => "checkbox");

$of_options[] = array( "name" => __("Post featured image link","framework"),
					"desc" => __("select the type you want the featured image (post thumbnaoil) in blog to link to","framework"),
					"id" => $shortname."_blog_featured_image_link",
					"std" => 'lightbox',
					"type" => "select",
					"options" => array(
						'lightbox','single page'
					));

					
$of_options[] = array( "name" => __("Custom post thumbnail size (height)","framework"),
					"desc" => __("Enter the height value for custom thumbnail size in Blog page (Default height is unlimited , nice value is 220)","framework"),
					"id" => $shortname."_post_featured_image_height",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => __("Excerpt length","framework"),
					"desc" => __("Change excerpt length to display in blog page. (default is 100 words)","framework"),
					"id" => $shortname."_custom_excerpt_length",
					"std" => 100,
					"fold" => $shortname."_enable_post_excerpt",
					"type" => "select",
					"options" => array(
						55,100,150,200,250,300
					));
					
$of_options[] = array( "name" => __("Enable read more button","framework"),
					"desc" => __("Check this if you want to show readmore button in blog page ","framework"),
					"id" => $shortname."_hide_readmore_button",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Hide Post meta info","framework"),
					"desc" => __("Uncheck to hide the meta info in blog page","framework"),
					"id" => $shortname."_show_post_meta_info",
					"std" => array('date','author','category','comments'),
					"type" => "multicheck",
					"options" => $of_options_blog_meta);
					
/*Porfolio Settings*/
$of_options[] = array( "name" => __("Portfolio Settings","framework"),
					"type" => "heading");

$of_options[] = array( "name" => __("Portfolio Layout","framework"),
					"desc" => __("Select a portfolio layout style. (Fit rows or masonry)","framework"),
					"id" => $shortname."_portfolio_layout",
					"std" => "fitRows",
					"type" => "images",
					"options" => array(
						'fitRows' => $url . 'porfolio-fitrows.png',
						'masonry' => $url . 'porfolio-masonry.png')
					); 
$of_options[] = array( "name" => __("Portfolio Columns","framework"),
					"desc" => __("Select the number of columns you would like to display in the Porfolio page.","framework"),
					"id" => $shortname."_porfolio_columns",
					"std" => "3",
					"type" => "select",
					"options" => array('3','4'));

$of_options[] = array( "name" => __("Custom porfolio thumbnail size (height)","framework"),
					"desc" => __("Enter the height value for custom thumbnail size in Porfolio page (Default height is unlimited , nice value is 150) ","framework"),
					"id" => $shortname."_porfolio_featured_image_height",
					"std" => "",
					"type" => "text"); 
$of_options[] = array( "name" => __("Portfolio featured image link","framework"),
					"desc" => __("select the type you want the featured image (post thumbnaoil) in portfolio page to link to","framework"),
					"id" => $shortname."_portfolio_featured_image_link",
					"std" => 'lightbox',
					"type" => "select",
					"options" => array(
						'lightbox','single page'
					));
					
$of_options[] = array( "name" => __("Portfolio Page Title","framework"),
					"desc" => __("Enter the title for your portfolio page.","framework"),
					"id" => $shortname."_portfolio_page_title",
					"std" => "Our Porfolio",
					"type" => "text"); 
					
/*$of_options[] = array( "name" => __("Portfolio Page ","framework"),
					"desc" => __("Enter the title for your portfolio page.","framework"),
					"id" => $shortname."_portfolio_page_url_select",
					"options" => $of_pages,
					"std" => "",
					"type" => "select");	*/				
					
$of_options[] = array( "name" => __("Portfolio Page URL","framework"),
					"desc" => __("Enter the URL to your portfolio page. Used for breadcrumbs.","framework"),
					"id" => $shortname."_portfolio_page_url",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __("Rewrite Portfolio Items URL Base","framework"),
					"desc" => sprintf( __( "The base of all portfolio item URLs (re-save the %s after changing this setting).","framework" ), '<a href="' . admin_url( 'options-permalink.php' ) . '">' . __( 'Permalinks', 'framework' ) . '</a>' ),
					"id" => $shortname."_portfolioitems_rewrite",
					"std" => "portfolio-items",
					"type" => "text");


$of_options[] = array( "name" => __("Height of image slider (Single Portfolio page)","framework"),
					"desc" => __("Default is 420px","framework"),
					"id" => $shortname."_porfolio_slide_height",
					"std" => "",
					"type" => "text");				
					
$of_options[] = array( "name" => __("Portfolio slider effect (Single Portfolio page)","framework"),
					"desc" => __("Select the slider effect you would like use in Single Portfolio .","framework"),
					"id" => $shortname."_porfolio_slide_effect",
					"std" => "fade",
					"type" => "select",
					"options" => array('slide','fade'));
					
$of_options[] = array( "name" => __("Portfolio slide direction (Single Portfolio page)","framework"),
					"desc" => __("Select the slider slide direction (horizontal or vertial) .","framework"),
					"id" => $shortname."_porfolio_slide_direction",
					"std" => "horizontal",
					"type" => "select",
					"options" => array('horizontal','vertical'));
					
$of_options[] = array( "name" => __("Enable portfolio excerpt","framework"),
					"desc" => __("Check this if you want to show the excerpt in portfolio page","framework"),
					"id" => $shortname."_enable_portfolio_excerpt",
					"std" => 0,
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Enable read more button","framework"),
					"desc" => __("Check this if you want to show readmore button in portfolio page ","framework"),
					"id" => $shortname."_hide_preadmore_button",
					"std" => 0,
					"type" => "checkbox");					
					
$of_options[] = array( "name" => __("Hide Portfolio title","framework"),
					"desc" => __("Check this if you want to hide Portfolio title in portfolio page ","framework"),
					"id" => $shortname."_hide_portfolio_title",
					"std" => 0,
					"type" => "checkbox");
/*Typography*/			
$of_options[] = array( "name" => __("Typography","framework"),
					"type" => "heading");
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-typo",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Change your heading style </h3>
					(From left to right:) Font size, Font style, Line height, Letter Spacing, Margin Bottom",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => __("H1 Headings","framework"),
					"desc" => __("default : 30px normal 40px 0px 35px","framework"),
					"id" => $shortname."_h1",
					"std" => array('size' => '30px','style' => 'normal','height' => '40px','letterspacing' => '0px','marginbottom' => '35px'),
					"type" => "typography"); 
					
$of_options[] = array( "name" => __("H2 Headings","framework"),
					"desc" => __("default : 26px normal 35px 0px 30px","framework"),
					"id" => $shortname."_h2",
					"std" => array('size' => '26px','style' => 'normal','height' => '35px','letterspacing' => '0px','marginbottom' => '30px'),
					"type" => "typography"); 

$of_options[] = array( "name" => __("H3 Headings","framework"),
					"desc" => __("default : 22px normal 30px 0px 20px","framework"),
					"id" => $shortname."_h3",
					"std" => array('size' => '22px','style' => 'normal','height' => '30px','letterspacing' => '0px','marginbottom' => '20px'),
					"type" => "typography");

$of_options[] = array( "name" => __("H4 Headings","framework"),
					"desc" => __("default : 20px normal 25px 0px 20px","framework"),
					"id" => $shortname."_h4",
					"std" => array('size' => '20px','style' => 'normal','height' => '25px','letterspacing' => '0px','marginbottom' => '20px'),
					"type" => "typography");

$of_options[] = array( "name" => __("H5 Headings","framework"),
					"desc" => __("default : 16px normal 25px 0px 15px","framework"),
					"id" => $shortname."_h5",
					"std" => array('size' => '16px','style' => 'normal','height' => '25px','letterspacing' => '0px','marginbottom' => '15px'),
					"type" => "typography");

$of_options[] = array( "name" => __("H6 Headings","framework"),
					"desc" => __("default : 13px normal 25px 0px 10px","framework"),
					"id" => $shortname."_h6",
					"std" => array('size' => '13px','style' => 'normal','height' => '25px','letterspacing' => '0px','marginbottom' => '10px'),
					"type" => "typography");  

$of_options[] = array( "name" => __("Google webfont","framework"),
					"desc" => __("Here are 20 best and most popular fonts from Google's Web Font API. <br><br>Select a fontface to be used for your website's headings ","framework"),
					"id" => $shortname."_custom_google_fonts",
					"std" => "none",
					"type" => "images",
					"options" => $md_google_font);
					

$of_options[] = array( "name" => __("Body Font","framework"),
					"desc" => __("Specify the body font properties","framework"),
					"id" => $shortname."_body_font",
					"std" => array('size' => '13px','face' => 'opensans','color' => '#777777'),
					"type" => "typography");
					
$of_options[] = array( "name" => __("Enable Custom Google Font","framework"),
					"desc" => __("Check this if you want to use your custom font","framework"),
					"id" => $shortname."_enable_choose_your_font",
					"std" => 0,
					"folds" => "0",
					"type" => "checkbox");

$of_options[] = array( "name" => __("Enter font name","framework"),
					"desc" => __("Enter a custom font name ( Ex: Titillium+Web)<br><br> Checkout <a href='http://www.google.com/webfonts/'>Google Web Fonts.</a> for a complete list of available font.","framework"),
					"id" => $shortname."_choose_your_font",
					"std" => "",
					"fold" => $shortname."_enable_choose_your_font",
					"type" => "text"); 
					

$of_options[] = array( "name" => __("Enter font embed link","framework"),
					"desc" => __("Example : <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700,400italic,700italic' rel='stylesheet' type='text/css'>","framework"),
					"id" => $shortname."_choose_your_font_embed",
					"std" => "",
					"fold" => $shortname."_enable_choose_your_font",
					"type" => "textarea"); 
					
/*Styling Options*/					
$of_options[] = array( "name" => __("Styling Options","framework"),
					"type" => "heading");
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-skin",
					"std" => __("<h3>Choose your built-in skins!, if you dont like them, you can customize by colorpicking your favorite color schemes :)</h3>","framework"),
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => __("Built-in Skins","framework"),
					"desc" => __("Select your themes alternative color scheme","framework"),
					"id" => $shortname."_custom_builtin_skins",
					"std" => "none",
					"type" => "images",
					"options" => $md_builtin_skins); 

$of_options[] = array( "name" => __("Disable border radius","framework"),
					"desc" => __("Check this if you like to use Square style ","framework"),
					"id" => $shortname."_disable_border_radius",
					"std" => 0,
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Select the overlay effect ","framework"),
					"desc" => __("this will affect to primary color elements, .","framework"),
					"id" => $shortname."_overlay_effect",
					"std" => "Default",
					"type" => "select",
					"options" => array(
						'Default',
						'Gradient Effect',
						'No Effect'
						)
					
					);

$of_options[] = array( "name" => __("Hide abtract background on banner","framework"),
					"desc" => __("Check this if you want to hide the abstract Crisscross background on banner. ","framework"),
					"id" => $shortname."_hide_abstract_background",
					"std" => 0,
					"type" => "checkbox");
$of_options[] = array( "name" => __("Primary color","framework"),
					"desc" => __("Pick a Primary color for your site (default: #D62831).","framework"),
					"id" => $shortname."_primary_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Secondary color","framework"),
					"desc" => __("Pick a Secondary color for your site (default: #555555).","framework"),
					"id" => $shortname."_secondary_color",
					"std" => "",
					"type" => "color");

$of_options[] = array( "name" => __("Body content Link color","framework"),
					"desc" => __("Pick a link color for body content (default: #D62831).","framework"),
					"id" => $shortname."_body_link_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Body content Link:hover color","framework"),
					"desc" => __("Pick a link color for body content on hover state  (default: #000000).","framework"),
					"id" => $shortname."_body_link_hover_color",
					"std" => "",
					"type" => "color");

$of_options[] = array( "name" => __("Footer & Top bar Link color","framework"),
					"desc" => __("Pick a link color for footer  (default: #FFFFFF).","framework"),
					"id" => $shortname."_footer_topbar_link_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Footer & Top bar Link:hover color","framework"),
					"desc" => __("Pick a link color for footer on hover state  (default: #D62831).","framework"),
					"id" => $shortname."_footer_topbar_link_hover_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Top Border","framework"),
					"desc" => "Syle the top border. (default:5px solid #555555)",
					"id" => $shortname."_top_border",
					"std" => array('width' => '5','style' => 'solid','color' => '#555555'),
					"type" => "border"); 

$of_options[] = array( "name" =>  __("Body Background Color","framework"),
					"desc" => __("Pick a background color for the theme (default: #777777).","framework"),
					"id" => $shortname."_body_background_color",
					"std" => "",
					"type" => "color");	
					
$of_options[] = array( "name" =>  __("Enable body background image","framework"),
					"id" => $shortname."_enable_body_background_image",
					"desc" => __("Check this to enable body background for boxed-layout style","framework"),
					"std" => "",
					"folds" => 0,
					"type" => "checkbox");					
					
$of_options[] = array( "name" => __("Upload Body Background image","framework"),
					"desc" => __("Upload your background image ( only visible when you use boxed-layout style)","framework"),
					"id" => $shortname."_body_background_image",
					"std" => "",
					"fold" => $shortname."_enable_body_background_image",
					"type" => "media"); 

$of_options[] = array( "name" => __("Body Background images Size","framework"),
					"desc" => __("Select the backgound image Size","framework"),
					"id" => $shortname."_body_background_image_size",
					"std" => "cover",
					"type" => "select",
					"fold" => $shortname."_enable_body_background_image",
					"options" => array("auto", "contain","cover" )
					);
					
$of_options[] = array( "name" => __("Body Background images Position","framework"),
					"desc" => __("Select the backgound image Position","framework"),
					"id" => $shortname."_body_background_image_position",
					"std" => "top center",
					"type" => "select",
					"fold" => $shortname."_enable_body_background_image",
					"options" => array("left top", "right top","center top" ,"left bottom", "right bottom","center bottom")
					); 
				
$of_options[] = array( "name" => __("Body Background images repeat","framework"),
					"desc" => __("Select the backgound image repeat","framework"),
					"id" => $shortname."_body_background_image_repeat",
					"std" => "no-repeat",
					"type" => "select",
					"fold" => $shortname."_enable_body_background_image",
					"options" => array("no-repeat", "repeat-x","repeat-y")
					); 
					
$of_options[] = array( "name" => __("Body Background images attachment","framework"),
					"desc" => __("Select the backgound image attachment","framework"),
					"id" => $shortname."_body_background_image_attachment",
					"std" => "fixed",
					"type" => "select",
					"fold" => $shortname."_enable_body_background_image",
					"options" => array("fixed", "scroll")
					); 
					
					
					
$of_options[] = array( "name" =>  __("Content Background Color","framework"),
					"desc" => __("Pick a background color for the theme (default: #F1F1F1).","framework"),
					"id" => $shortname."_content_background_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Enable content background pattern","framework"),
					"desc" => __("Check this if you want to use background pattern (also you can add more background pattern by copying image to theme folder maxx-wp/images/bg/)","framework"),
					"id" => $shortname."_enable_content_background_pattern",
					"std" => 0,
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" => __("Content Background Pattern","framework"),
					"desc" => __("Select a background pattern.","framework"),
					"id" => $shortname."_content_background_pattern",
					"std" => $bg_images_url."bg12.png",
					"fold" => $shortname."_enable_content_background_pattern",
					"type" => "tiles",
					"options" => $bg_images,
					);
					
$of_options[] = array( "name" =>  __("Top bar Background Color","framework"),
					"desc" => __("Pick a background color for the header (default: #2b2b2b).","framework"),
					"id" => $shortname."_top_bar_background_color",
					"std" => "",
					"type" => "color");   

$of_options[] = array( "name" => __("Enable Slider Background","framework"),
					"desc" => __("Check this if you want to use Slider background ","framework"),
					"id" => $shortname."_enable_slider_background",
					"std" => 0,
					"folds" => "0",
					"type" => "checkbox");
					
$of_options[] = array( "name" =>  __("Slider Background Color","framework"),
					"desc" => __("Pick a background color for the Slider (default: #2b2b2b).","framework"),
					"id" => $shortname."_slider_background_color",
					"std" => "",
					"fold" => $shortname."_enable_slider_background",
					"type" => "color");   

$of_options[] = array( "name" =>  __("Footer Widget Background Color","framework"),
					"desc" => __("Pick a background color for the footer widget (default: #2b2b2b). (the color should be dark)","framework"),
					"id" => $shortname."_footer_widget_background_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Disable Footer Widget background overlay","framework"),
					"desc" => __("Check this if you don't want to use background overlay","framework"),
					"id" => $shortname."_disable_footer_background_overlay",
					"std" => 0,
					"type" => "checkbox");	
					
$of_options[] = array( "name" =>  __("Footer Copyright Background Color","framework"),
					"desc" => __("Pick a background color for the footer copyright (default: #181818). (the color should be dark)","framework"),
					"id" => $shortname."_footer_copyright_background_color",
					"std" => "",
					"type" => "color");				  
					
$of_options[] = array( "name" => __("Custom CSS","framework"),
                    "desc" => __("Quickly add some CSS to your theme by adding it to this block.","framework"),
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");


/*Social Network*/
$of_options[] = array( "name" => __("Social Network","framework"),
					"type" => "heading");

$of_options[] = array( 'name' => __('Twitter API','framework'),
							'type' => 'subheading',
							'desc' => __('Your application\'s OAuth settings','framework'),);
		
		
$of_options[] = array('name' => '','id' => '','std' => __('<h3 style="margin: 5px 0;">Create your application and copy the Consumer key & Access token at <a href="https://dev.twitter.com/apps/">Twitter API</a></h3>','framework'),
					'type' => 'info');

$of_options[] = array( 'name' => __('Consumer key','framework'),
					'desc' => __('Enter your Consumer key from <strong>OAuth settings</strong>.','framework'),
					'id' => $shortname.'_twitter_consumer_key',
					'std' => '',
					'type' => 'text');

$of_options[] = array( 'name' => __('Consumer secret','framework'),
					'desc' => __('Enter your Consumer secret from <strong>OAuth settings</strong>.','framework'),
					'id' => $shortname.'_twitter_consumer_secret',
					'std' => '',
					'type' => 'text');

$of_options[] = array( 'name' => __('Access token','framework'),
					'desc' => __('Enter your Access token from <strong>Your access token</strong>.','framework'),
					'id' => $shortname.'_twitter_access_token',
					'std' => '',
					'type' => 'text');

$of_options[] = array( 'name' => __('Access token secret','framework'),
					'desc' => __('Enter your Access token secret from <strong>Your access token</strong>.','framework'),
					'id' => $shortname.'_twitter_access_token_secret',
					'std' => '',
					'type' => 'text');
					

$of_options[] = array( 'name' => __('URL','framework'),
							'type' => 'subheading',
							'desc' => __('Your application\'s OAuth settings','framework'),);
					
 $of_options[] = array( "name" => __("Blogger","framework"),
					"desc" => __("Add your Blogger url.","framework"),
					"id" => "blogger",
					"std" => "",
					"type" => "text"); 
$of_options[] = array( "name" => __("Delicious","framework"),
					"desc" => __("Add your Delicious url.","framework"),
					"id" => "delicious",
					"std" => "",
					"type" => "text"); 
 $of_options[] = array( "name" => __("DeviantArt","framework"),
					"desc" => __("Add your DeviantArt url.","framework"),
					"id" => "deviantart",
					"std" => "",
					"type" => "text"); 
 $of_options[] = array( "name" => __("Digg","framework"),
					"desc" => __("Add your Digg url.","framework"),
					"id" => "digg",
					"std" => "",
					"type" => "text");
$of_options[] = array( "name" => __("Dribbble","framework"),
					"desc" => __("Add your Dribbble url.","framework"),
					"id" => "dribbble",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => __("Email Adress","framework"),
					"desc" => __("Add Email address (ex:mailto:manh.dinh@me.com)","framework"),
					"id" => "email",
					"std" => "mailto:manh.dinh@me.com",
					"type" => "text");
$of_options[] = array( "name" => __("Facebook","framework"),
					"desc" => __("Add your Facebook url.","framework"),
					"id" => "facebook",
					"std" => "http://www.facebook.com/envato",
					"type" => "text");	
$of_options[] = array( "name" => __("Flickr","framework"),
					"desc" => __("Add your Flickr url.","framework"),
					"id" => "flickr",
					"std" => "",
					"type" => "text");								
 $of_options[] = array( "name" => __("Forrst","framework"),
					"desc" => __("Add your Forrst url.","framework"),
					"id" => "forrst",
					"std" => "",
					"type" => "text"); 
$of_options[] = array( "name" => __("Google Plus","framework"),
					"desc" => __("Add your Google Plus url.","framework"),	
					"id" => "googleplus",
					"std" => "",
					"type" => "text");  
 $of_options[] = array( "name" => __("Lastfm","framework"),
					"desc" => __("Add your Lastfm url.","framework"),
					"id" => "lastfm",
					"std" => "",
					"type" => "text"); 
$of_options[] = array( "name" => __("Linked in","framework"),
					"desc" => __("Add your Linked in url.","framework"),
					"id" => "linkedin",
					"std" => "",
					"type" => "text"); 
$of_options[] = array( "name" => __("Pinterest","framework"),
					"desc" => __("Add your Pinterest url.","framework"),
					"id" => "pinterest",
					"std" => "",
					"type" => "text");  
$of_options[] = array( "name" => __("Rss","framework"),
					"desc" => __("Add your Rss url.","framework"),
					"id" => "rss",
					"std" => "",
					"type" => "text");
$of_options[] = array( "name" => __("ShareThis","framework"),
					"desc" => __("Add your ShareThis url.","framework"),
					"id" => "sharethis",
					"std" => "",
					"type" => "text");
$of_options[] = array( "name" => __("Skype","framework"),
					"desc" => __("Add your Skype url<br>Eg: skype:username?call.","framework"),
					"id" => "skype",
					"std" => "",
					"type" => "text");  
$of_options[] = array( "name" => __("StumbleUpon","framework"),
					"desc" => __("Add your StumbleUpon url","framework"),
					"id" => "stumbleupon",
					"std" => "",
					"type" => "text");  
$of_options[] = array( "name" => __("Tumblr","framework"),
					"desc" => __("Add your Tumblr url","framework"),
					"id" => "tumblr",
					"std" => "",
					"type" => "text");
$of_options[] = array( "name" => __("Twitter","framework"),
					"desc" => __("Add your Twitter url.","framework"),
					"id" => "twitter",
					"std" => "https://twitter.com/#!/envato",
					"type" => "text"); 
$of_options[] = array( "name" => __("Vimeo","framework"),
					"desc" => __("Add your Vimeo url.","framework"),
					"id" => "vimeo",
					"std" => "",
					"type" => "text");
$of_options[] = array( "name" => __("Yahoo","framework"),
					"desc" => __("Add your Yahoo url","framework"),
					"id" => "yahoo",
					"std" => "",
					"type" => "text"); 
$of_options[] = array( "name" => __("Youtube","framework"),
					"desc" => __("Add your Youtube url","framework"),
					"id" => "youtube",
					"std" => "",
					"type" => "text");  
  
  


// Advanced Settings
$of_options[] = array( "name" => __("Advanced Settings","framework"),
					"type" => "heading");

$of_options[] = array( "name" => __("Take Site Offline","framework"),
					"desc" => __("This will show an offline message. Except for administrators, nobody will be able to access the site","framework"),
					"id" => $shortname."_offline_mode",
					"std" => "0",
          			"folds" => "0",
					"type" => "checkbox");    

$of_options[] = array( "name" => __("Offline heading","framework"),
					"desc" => __("Heading of Message","framework"),
					"id" => $shortname."_offline_heading",
					"std" => "Website currently Under construction",
          			"fold" => $shortname."_offline_mode",
					"type" => "text");
					
$of_options[] = array( "name" => __("Offline Message","framework"),
					"desc" => __("Message context","framework"),
					"id" => $shortname."_offline_about_msg",
					"std" => "Thanks for stopping by. We have just finish the back-end. Only the front-end to go!<br>So please, Comeback later !",
          			"fold" => $shortname."_offline_mode",
					"type" => "textarea");
					
// Backup Options
$of_options[] = array( "name" => __("Backup Options","framework"),
					"type" => "heading");
					
$of_options[] = array( "name" => __("Backup and Restore Options","framework"),
                    "desc" => __("You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.","framework"),
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"options" => ''
					);
$of_options[] = array( "name" => __("Transfer Theme Options Data","framework"),
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => __('<br>You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',"framework")
					);
					
$of_options[] = array( "name" => __("Hello there!","framework"),
					"desc" => "",
					"id" => "intro-download",
					"std" => __("<h3 style=\"margin: 0 0 10px;\"><a href=\"". get_template_directory_uri()."/functions/subscribers-list.csv\">Click here </a> to download the subscribed emails.</h3>","framework"),
					"icon" => true,
					"type" => "info");


	}
	

	
	
}
?>