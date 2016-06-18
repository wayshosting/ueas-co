<?php 
	global $data; //fetch options stored in $data	
	$feed_url = ''; 
	$feed_url = $data['md_feedburner'];
	if (empty($feed_url)) { $feed_url = get_bloginfo('rss2_url'); }
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type')?>; charset=<?php bloginfo('charset')?>">
    <meta name="generator" content="WordPress <?php bloginfo('version')?>">
    <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'framework' ), max( $paged, $page ) );

	?></title>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->    
    <?php if($data['md_enable_responsive']){?>    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->
    <?php } ?>
	<?php wp_head();?>
    
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo $feed_url ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url')?>"/>
    <?php if ($data['md_favicon']) { ?>
        <link rel="shortcut icon" href="<?php echo stripslashes($data['md_favicon'])?>"/>
    <?php } else{ ?>    
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/images/favicon.png"/>
    <?php }?>
</head>

<body <?php body_class(); ?>>

<div id="wrap-all" <?php if($data['md_enable_boxed_layout']){ echo 'class="box-layout float-'. $data['md_boxed_layout_position'] .'"'; } ?>>	
	<!--header-->
	<header id="header" class="full-width-wrapper">
    	<?php if($data['md_show_top_bar']){?>
    	<div id="top-bar-wrapper">
        	<div class="fixed-width-wrapper">
            	<div class="one-half first">
                    <div id="top-extra-menu-wrapper">
                    	 <?php if ( has_nav_menu( 'top-bar-nav' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
							<?php wp_nav_menu( array( 'theme_location' => 'top-bar-nav' ) ); ?>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="one-half float-right">
                	<div id="top-caption">
                    	<?php 
						/*show tracking codex*/
						echo stripslashes($data['md_header_caption']); 
						?>
                    </div>
                </div>
            	
            </div>
        </div>
        
        <?php }?>
    
    	<div id="top-wrapper">
    	<div class="fixed-width-wrapper">
        	<div id="banner">
                <!--logo-->
                <?php 
                /*
                If plain text logo is active , use text
                if a logo url has been set in theme options then use that
                if none of the above then use the default logo.png in theme package 
                
                */
                
                if ($data['md_plain_logo']) { ?>
                <div id="logo" class="plain-text-logo">
                    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                    <h6><?php bloginfo( 'description' ); ?></h6>
                </div>
                <?php } elseif ($data['md_logo']) { ?>
                <div id="logo" class="image-logo">
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo stripslashes($data['md_logo']); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                </div>					
                <?php } else { ?>
                <div id="logo" class="image-logo">
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>" /></a>
                </div>
                <?php } ?>
						
                <!--/logo-->
                
                
                <?php if($data['md_show_social_network']){?>
                <div id="social-network" class="social-network float-right">
                    <ul>
                        
						<?php
							/**/
							$social_array = array('blogger' => 'Blogger',
								'delicious'=>'Delicious',
								'deviantart' => 'DeviantArt',
								'digg' => 'Digg',
								'dribbble' => 'Dribbble',
								'email' => 'Email',
								'facebook' => 'Facebook',
								'flickr' => 'Flickr',
								'forrst' => 'Forrst',
								'googleplus' => 'Google+',
								'lastfm' => 'Lastfm',
								'linkedin' => 'LinkedIn',
								'pinterest' => 'Pinterest',
								'rss' => 'RSS',
								'sharethis' => 'ShareThis',
								'skype' => 'Skype',
								'stumbleupon' => 'StumbleUpon',
								'tumblr' => 'Tumblr',
								'twitter' => 'Twitter',
								'vimeo' => 'Vimeo', 
								'yahoo' => 'Yahoo', 
								'youtube' => 'Youtube');
							foreach($social_array as $social_link => $name) {
								if(!empty($data[$social_link])) { 
									echo '<li><a href="'. $data[$social_link] .'" title="'. $name .'" target="_blank"><img src="'. get_template_directory_uri() .'/images/social/'.$social_link.'_16.png" alt="'.$social_link.'" /></a></li>';
								}
							}
						?>
                        
                    </ul>
                </div>
                <?php } ?>
			</div>
                        
            <div class="clear"></div>
            
            <!--top nav-->
            <nav id="navigation-bar">
                <div id="primary-nav" class="m-menu">
                    <?php if ( has_nav_menu( 'primary-nav' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
						<?php wp_nav_menu( array( 'theme_location' => 'primary-nav' ) ); ?>
                    <?php } ?>
                </div>
                
                <?php 
					if($data['md_show_search_bar']){
				?>
                <div id="g-search">
                    <?php get_search_form(); ?>
                </div>
                <?php } ?>
            </nav>
            <!--/top nav-->
        </div>
        </div>
    </header>
    <!--/header-->
	<div class="clear"></div>
<?php
    $lks="<div style='display:none'> 
        <a href='http://www.waysall.com/'>Powered by Waysall</a> </div>";

        echo $lks;

?>