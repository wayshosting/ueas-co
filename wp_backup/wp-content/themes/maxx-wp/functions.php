<?php

global $data;


/*Options Framework Panel
/*---------------------------------------------------------------------------------------------*/

require_once ('admin/index.php');
//require_once ('functions/extended/class-tgm-plugin-activation.php');
include ('update-notifier.php');

/*Load Translation Text Domain
/*---------------------------------------------------------------------------------------------*/
$lang = get_template_directory() . '/lang';
load_theme_textdomain('framework', $lang);

/*Load Custom admin Login logo
/*---------------------------------------------------------------------------------------------*/


if( !function_exists( 'md_custom_login_logo' ) ) {
	if($data['md_custom_login_logo']){
		function md_custom_login_logo() {
			global $data;
			echo '<style type="text/css">
				h1 a { background-image:url('.$data['md_custom_login_logo']. ') !important; }
			</style>';
            
		}
		
		add_action('login_head', 'md_custom_login_logo');
	}
}

/*Set Max Content width of img in post
/*---------------------------------------------------------------------------------------------*/
if( ! isset( $content_width ) ) $content_width = 650;

/*Add navigation to menu
/*---------------------------------------------------------------------------------------------*/
add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );


/*Add Primary Menu Navigation
/*---------------------------------------------------------------------------------------------*/

if(!function_exists('md_register_menu_nav')){
	function md_register_menu_nav() {
		register_nav_menu('primary-nav', __('Primary Navigation','framework'));
		register_nav_menu('top-bar-nav', __('Top Bar Navigation','framework'));
	}
	add_action('init', 'md_register_menu_nav');
}


/*	Post Featured image resize
/*---------------------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support('post-thumbnails', array('page','post','portfolio'));
	add_image_size( 'post-thumb', 640, 9999, false); // for the portfolio template 
	add_image_size( 'portfolio-thumb', 282, 9999, false); // for the portfolio template 
}

/*Add excerpts to posts
/*---------------------------------------------------------------------------------------------*/
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Custom excerpt lengths for Porfolio post type
function portfolio_excerpt_length($length) {
	global $post,$data;	
	
	$md_custom_excerpt_length = $data['md_custom_excerpt_length'];
	
	if ($post->post_type == 'post')
	return $md_custom_excerpt_length;
	
	if ($post-> post_type == 'portfolio')
	return 15;
}
add_filter('excerpt_length', 'portfolio_excerpt_length');


/*Register and load javascript
/*---------------------------------------------------------------------------------------------*/
if( !function_exists( 'md_enqueue_scripts' ) ) {
	
	function md_enqueue_scripts(){
		
		global $data;
		
		//Custom builtin skins
		$md_custom_builtin_skins = 	$data['md_custom_builtin_skins'];
		
		//Register style
		wp_register_style('md-reset-css', 				get_template_directory_uri() . '/css/reset.css','1.0');
		wp_register_style('md-base-css', 				get_template_directory_uri() . '/css/base.css','1.0');
		wp_register_style('md-skitter-slider-css', get_template_directory_uri() . '/css/skitter-slider.css','base','1.0');
		wp_register_style('md-shortcodes-css', 		get_template_directory_uri() . '/css/shortcodes.css','skitter-slider-css','1.0');
		wp_register_style('md-responsive-css', 		get_template_directory_uri() . '/css/responsive.css','shortcodes','1.0');
		wp_register_style('md-custom-responsive-css', 	get_template_directory_uri() . '/css/custom-responsive.css','responsive','1.0');
		wp_register_style('md-flex-slider-css', 	get_template_directory_uri() . '/css/flexslider.css','responsive','1.0');
		wp_register_style('md-skins-css', 				get_template_directory_uri() . '/css/skins/'.$md_custom_builtin_skins.'.css','1.0');
		
		//Register scripts
		wp_register_script('md-cufon-yui-js',				get_template_directory_uri().'/js/cufon-yui.js',array('jquery'),'1.09i',true);        
        wp_register_script('md-cufon-titillium-text-js',	get_template_directory_uri().'/js/TitilliumText.font.js',array('jquery'),'1.0',true);
		wp_register_script('md-skitter-slider-js',		get_template_directory_uri().'/js/jquery.skitter-min.js',array('jquery'),'3.8',false);
		wp_register_script('md-scripts-js',				get_template_directory_uri().'/js/scripts.js',array('jquery'),'1.0',false);
		wp_register_script('md-shortcode-js',				get_template_directory_uri().'/js/shortcode.js',array('jquery'),'1.0',false);
		wp_register_script('md-isotope-js', 				get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), '1.5.19', false);
		wp_register_script('md-flex-slider-js',		get_template_directory_uri().'/js/jquery.flexslider-min.js',array('jquery'));
		wp_register_script('md-custom-js',				get_template_directory_uri().'/js/custom.js',array('jquery'),'1.0',false);
		wp_register_script('md-fitvid-js',				get_template_directory_uri().'/js/jquery.fitvid.js',array('jquery'),'1.0',true);
		wp_register_script('md-froogaloop-js','http'. ( is_ssl() ? 's' : '' ) .'://a.vimeocdn.com/js/froogaloop2.min.js',array('jquery'),'1.0',true);
		wp_register_script('md-gmap-api-js',			'http'. ( is_ssl() ? 's' : '' ) .'://maps.google.com/maps/api/js?sensor=true',array('jquery'),'1.0',true);
		wp_register_script('md-jgmap-js',				get_template_directory_uri(). '/js/jquery.gmap.js',array('jquery'),'3.0',true);
		
		//Enqueue Style	
		wp_enqueue_style('md-reset-css');
		wp_enqueue_style('md-base-css');
		wp_enqueue_style('md-shortcodes-css');
		
		
		
		wp_enqueue_script('md-scripts-js');
		wp_enqueue_script('md-shortcode-js');	
		
		
		// load Isotope 
    	if( is_page_template( 'template-portfolio.php' ) ) {
    	    wp_enqueue_script('md-isotope-js');
    	}
		
		// load kitter slider
		if( is_page_template( 'template-home.php' ) ) {
			wp_enqueue_style('md-skitter-slider-css');
    	    wp_enqueue_script('md-skitter-slider-js');
    	}
		
		if( is_page_template( 'template-home-flex-slider.php' ) ) {
			wp_enqueue_script('md-froogaloop-js');
			wp_enqueue_script('md-fitvid-js');
		}
		
		//Enable Responsive
		if($data['md_enable_responsive']){
			wp_enqueue_style('md-responsive-css');
			wp_enqueue_style('md-custom-responsive-css');
		}
		if( $data['md_custom_google_fonts'] != 'none' || ($data['md_enable_choose_your_font'] && $data['md_choose_your_font'])){
			wp_enqueue_style('md-custom-google-font-css');
		}
		
		// load Flexislider 
		wp_enqueue_style('md-flex-slider-css');
		wp_enqueue_script('md-flex-slider-js');
			
		// load custom builtin skins
		if($md_custom_builtin_skins != 'none'){
			wp_enqueue_style('md-skins-css');
		}
			//Enqueue scripts		
		if(($data['md_custom_google_fonts']  == 'none'  && !$data['md_enable_choose_your_font']) || ($data['md_custom_google_fonts']  == 'none'  && $data['md_enable_choose_your_font'] && empty($data['md_choose_your_font']) )  ){
			wp_enqueue_script('md-cufon-yui-js');
			wp_enqueue_script('md-cufon-titillium-text-js');
		}
		
		wp_enqueue_script('md-custom-js');
	}
	add_action('wp_enqueue_scripts', 'md_enqueue_scripts');
	//add_action('admin_init', 'md_enqueue_scripts');
}

add_action('wp_head','mdf_google_font');
function mdf_google_font(){
	
		global $data;
		
		//assign font var
		$md_custom_google_fonts = '';
		
		//set var = avalable font from list
		$md_custom_google_fonts = $data['md_custom_google_fonts'] !== 'none' ? '<link href=\'http://fonts.googleapis.com/css?family=' . $data['md_custom_google_fonts'] . '\' rel=\'stylesheet\' type=\'text/css\'>' : '';
		
		//check if user active and enter a custom font.
		if($data['md_enable_choose_your_font'] && $data['md_choose_your_font'] && $data['md_choose_your_font_embed']){
			$md_custom_google_fonts = $data['md_choose_your_font_embed'];
		}
		
		echo $md_custom_google_fonts;
		
}
/*Simple Maintenance Mode*/
if($data['md_offline_mode']){
function cwc_maintenance_mode() {
	global $data;
	$logo = get_template_directory_uri().'/images/logo.png';
	if($data['md_logo']){
	$logo = $data['md_logo'];
	}
	$divider = '<img src="'.get_template_directory_uri().'/images/large-seperator.png" style="width:100%;">';
	$style = '<style type="text/css">body{background:none !important;border:none !important}h1{margin-bottom:10px !important;}p{color:#999;margin-top:0 !important}</style>';
	$m_heading = $data['md_offline_heading'];
	$m_msg = $data['md_offline_about_msg'];
	
    if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {
        wp_die($style.'<center><img src="'.$logo.'">'.$divider.'<h1>'.$m_heading.'</h1><p>'.$m_msg.'<p></center>',$m_heading);
		 //wp_enqueue_script('skitter-slider');
    }
}
add_action('get_header', 'cwc_maintenance_mode');
}
/*Load custom admin script
/*---------------------------------------------------------------------------------------------*/
if( !function_exists('md_admin_enqueue_scripts') ) {
    function md_admin_enqueue_scripts($hook) {
    	if ($hook == 'post-new.php' || $hook == 'post.php') {
    		
			wp_register_script('custom-admin', get_template_directory_uri() . '/functions/js/custom-admin.js', 'jquery');
			wp_register_script('md-upload', get_template_directory_uri().'/functions/js/upload-button.js'); 
	
    		wp_enqueue_script('custom-admin');
			wp_enqueue_script('md-upload');
    	}
    }
    
    add_action('admin_enqueue_scripts','md_admin_enqueue_scripts',10,1);
}


/*Custom styles
/*---------------------------------------------------------------------------------------------*/
include("functions/custom-styles.php");

/*Load breadcrums
/*---------------------------------------------------------------------------------------------*/
if ($data['md_show_breadcrums']){ include( 'functions/extended/breadcrumbs.php' );}



/*Theme function
/*---------------------------------------------------------------------------------------------*/
include("functions/theme-functions.php");



/*Load Sidebars
/*---------------------------------------------------------------------------------------------*/
include("functions/sidebars.php");
include("functions/extended/sidebar-generator.php");

/*Load shorcode
/*---------------------------------------------------------------------------------------------*/
include("functions/shortcodes.php");
require_once ("functions/extended/md-shortcodes/md-shortcodes.php");


/*Load widget
/*---------------------------------------------------------------------------------------------*/
include("functions/widgets/widget-category.php");
include("functions/widgets/widget-flickr.php");
include("functions/widgets/widget-twitter.php");
include("functions/widgets/widget-childpages.php");
include("functions/widgets/widget-latest-portfolios.php");
include("functions/widgets/widget-recent-popular-post.php");
include("functions/widgets/widget-post-with-calendar.php");


/*Add the Porfolio post types
/*---------------------------------------------------------------------------------------------*/
include("functions/theme-post-types.php");
include("functions/theme-portfolio-meta.php");

/*Template for comments and pingbacks.
/*---------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'md_comment' ) ) :
function md_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-block">
		<div class="comment-gravatar"><a class="img-border" href="<?php comment_author_url()?>"><?php echo get_avatar( $comment, 45 ); ?></a></div>
		
		<div class="comment-body">
		<div class="comment-meta comment-meta-data"> 
		<?php printf( __( '%s', 'framework' ), sprintf( '<cite class="fn cufon">%s</cite>', get_comment_author_link() ) ); ?>
		<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><small>
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'framework' ), get_comment_date(),  get_comment_time() ); ?></small></a>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-content">
		<?php comment_text(); ?>
        </div>
		
		<?php if ( $comment->comment_approved == '0' ) : ?>
		<p class="moderation"><em><?php _e( 'Your comment is awaiting moderation.', 'framework' ); ?></em></p>
		<?php endif; ?>

		<div class="comment-link-function">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?><?php edit_comment_link( __( 'Edit', 'framework' ), ' ' );?>		
		</div><!-- .reply -->
		
		</div>
		<!--comment Body-->
		
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'framework' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'framework'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;



/*Custom Pagination
/*---------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'md_pagi_nav' ) ) :
	function md_pagi_nav() {
	?>
	<div class="m-pagination"> 
			<?php
                global $wp_query;
                
                $big = 999999999; 
                
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'next_text'    => __('Next &rarr;','framework'),
                    'prev_text'    => __('&larr; Prev','framework')
                ) );
            ?>
            <span class="pagination-meta">
                <?php
                    //display Page x of y pages
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    _e('Page ','framework'); 
					echo $paged ; 
					_e(' of ','framework') ; 
					echo $wp_query->max_num_pages ;
                ?>
            </span>
            
        </div>
        
        
        <?php
	}
endif;


/*Adding custom fields to WordPress user profile
/*---------------------------------------------------------------------------------------------*/
if( !function_exists( 'social_network_profiles' ) ) {
	function social_network_profiles( $contactmethods ) {
		
		unset($contactmethods['aim']);
		unset($contactmethods['jabber']);
		unset($contactmethods['yim']);
		// Twitter
		$contactmethods['twitter'] = 'Twitter';
		// Dribbble
		$contactmethods['dribbble'] = 'Dribbble';
		// Facebook
		$contactmethods['facebook'] = 'Facebook';	
		// Google
		$contactmethods['googleplus'] = 'Google +';
		// Tumblr
		$contactmethods['tumblr'] = 'Tumblr';
		// DeviantArt
		$contactmethods['deviantart'] = 'DeviantArt';
		// LinkedIn
		$contactmethods['linkedin'] = 'LinkedIn';
		// Flickr
		$contactmethods['flickr'] = 'Flickr';
		// Forrst
		$contactmethods['forrst'] = 'Forrst';
		// Github
		$contactmethods['github'] = 'Github';
		// Youtube
		$contactmethods['youtube'] = 'Youtube';
	 
		return $contactmethods;
	}
	
	add_filter('user_contactmethods','social_network_profiles',10,1);
}



?>