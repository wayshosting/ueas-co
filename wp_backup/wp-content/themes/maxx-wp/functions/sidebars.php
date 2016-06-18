<?php 
/*Add main sidebar
/*---------------------------------------------------------------------------------------------*/
global $data;

$md_footer_columns = $data['md_footer_columns']; /*get the number of column from theme option*/


if(function_exists('register_sidebar')){

	/*Default sidebar*/
	register_sidebar(
		array(
			'name' => __('Main Sidebar','framework'),
			'id' => 'main-sidebar',
			'before_title' => '<h3 class="widget-title cufon first-word">',
			'after_title' => '</h3>',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>'
		)
	);
	
	
	/*Dynamic footer widget sidebar*/
	register_sidebars($md_footer_columns , 
		array(
			'name'=>__('Footer Widget %s','framework'),
			'id' => 'footer-widget',
			'before_title' => '<h3 class="widget-title cufon first-word">',
			'after_title' => '</h3>',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>'
		)
	);	
	
}

?>