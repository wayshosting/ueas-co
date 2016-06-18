<?php

/*Initialize Portfolio function
/*---------------------------------------------------------------------------------------------*/
add_action('init', 'md_custom_portfolio_int');
function md_custom_portfolio_int() 
{
	//Portfolio custom post type
	$labels = array(
		'name' => __( 'Portfolio','framework'),
		'singular_name' => __( 'Portfolio','framework' ),
		'add_new' => __('Add New','framework'),
		'add_new_item' => __('Add New Project','framework'),
		'edit_item' => __('Edit Project','framework'),
		'new_item' => __('New Project','framework'),
		'view_item' => __('View Project','framework'),
		'search_items' => __('Search Project','framework'),
		'not_found' =>  __('No Project found','framework'),
		'not_found_in_trash' => __('No Project found in Trash','framework'), 
		'parent_item_colon' => '',
		'menu_name' => 'Portfolio'
	);
	
	global $data;
	
	$md_portfolioitems_rewrite = $data['md_portfolioitems_rewrite'];
	if( empty( $md_portfolioitems_rewrite ) ) { 
		$md_portfolioitems_rewrite = 'portfolio-items'; 
	}
	  
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'rewrite' => array( 'slug' => $md_portfolioitems_rewrite ),
		'menu_icon' =>	get_template_directory_uri() . '/admin/assets/images/icon-porfolio-16x16.png' ,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 4,
		//features support in Pofolio post type  
		'supports' => array('title','editor','excerpt','thumbnail','page-attributes')
	  ); 
	  
	//Register the custom post type 
	register_post_type('portfolio',$args);
	  
	  
	//Portfolio Taxonomy Labels
	$labels = array(
		'name' => __( 'Project Type', 'framework' ),
		'singular_name' => __( 'Project Type', 'framework' ),
		'search_items' =>  __( 'Search Project Types', 'framework' ),
		'popular_items' => __( 'Popular Portfolio Types', 'framework' ),
		'all_items' => __( 'All Project Types', 'framework' ),
		'parent_item' => __( 'Parent Project Type', 'framework' ),
		'parent_item_colon' => __( 'Parent Project Type:', 'framework' ),
		'edit_item' => __( 'Edit Project Type', 'framework' ), 
		'update_item' => __( 'Update Project Type', 'framework' ),
		'add_new_item' => __( 'Add New Project Type', 'framework' ),
		'new_item_name' => __( 'New Project Type Name', 'framework' ),
		'separate_items_with_commas' => __( 'Separate Project types with commas', 'framework' ),
		'add_or_remove_items' => __( 'Add or remove Project types', 'framework' ),
		'choose_from_most_used' => __( 'Choose from the most used Project types', 'framework' ),
		'menu_name' => __( 'Project Types', 'framework' )
	);
	
	
	register_taxonomy('portfolio-type', array('portfolio'), 
	    array(
	        'hierarchical' => true, 
	        'labels' => $labels,
	        'show_ui' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'portfolio-type', 'hierarchical' => true)
	    )
	); 
}


/*Custom Porfolio Messages
/*---------------------------------------------------------------------------------------------*/

add_filter('post_updated_messages', 'project_updated_messages');

function project_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['portfolio'] = array(
	0 => '', 
	1 => sprintf( __('Project updated. <a href="%s">View project</a>','framework'), esc_url( get_permalink($post_ID) ) ),
	2 => __('Custom field updated.','framework'),
	3 => __('Custom field deleted.','framework'),
	4 => __('Project updated.','framework'),
	/* translators: %s: date and time of the revision */
	5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s','framework'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => sprintf( __('Project published. <a href="%s">View project</a>','framework'), esc_url( get_permalink($post_ID) ) ),
	7 => __('Project saved.','framework'),
	8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>','framework'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>','framework'),
	date_i18n( __( 'M j, Y @ G:i','framework' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>','framework'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}