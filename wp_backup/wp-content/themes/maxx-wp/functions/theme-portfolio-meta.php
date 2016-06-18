<?php

/*Define Porfolio Metabox Fields
/*---------------------------------------------------------------------------------------------*/

$prefix = 'md_';
 
$meta_box_portfolio = array(
	'id' => 'md-meta-box-portfolio',
	'title' =>  __('Portfolio Detail Settings', 'framework'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
    	array(
			'name' =>  __('Portfolio Type', 'framework'),
			'desc' => __('Choose the type of portfolio you wish to display.', 'framework'),
			'id' => $prefix . 'portfolio_type',
			"type" => "select",
			'std' => 'image',
			'options' => array('image', 'video')
		),
    	array(
    	   'name' => __('Portfolio Client', 'framework'),
    	   'desc' => '',
    	   'id' => $prefix . 'portfolio_client',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
    	   'name' => __('Portfolio URL', 'framework'),
    	   'desc' => '',
    	   'id' => $prefix . 'portfolio_url',
    	   'type' => 'text',
    	   'std' => ''
    	)
	)
);

$meta_box_portfolio_video = array(
	'id' => 'md-meta-box-portfolio-video',
	'title' => __('Video Settings', 'framework'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' =>  __('Video Source', 'framework'),
			'desc' => __('Choose the type of Video source.', 'framework'),
			'id' => $prefix . 'video_type',
			"type" => "select",
			'std' => 'Youtube',
			'options' => array('Youtube', 'Vimeo')
		),
		array(
			'name' => __('Video Embed Code', 'framework'),
			'desc' => __('Paste the ID of the video is hosted on, such as Youtube and Vimeo. you want to show <br />E.g. http://www.youtube.com/watch?v=<strong>tbPhf_KXNZI</strong><br /> http://vimeo.com/<strong>6428069</strong', 'framework'),
			'id' => $prefix . 'portfolio_video_embed_code_id',
			'type' => 'textarea',
			'std' => ''
		)
	),
	
);

add_action('admin_menu', 'md_add_box_portfolio');


/*Add metabox to edit page
/*---------------------------------------------------------------------------------------------*/
 
function md_add_box_portfolio() {
	global 	$meta_box_portfolio, 
			$meta_box_portfolio_video;
	
	add_meta_box($meta_box_portfolio['id'], $meta_box_portfolio['title'], 'md_show_box_portfolio', $meta_box_portfolio['page'], $meta_box_portfolio['context'], $meta_box_portfolio['priority']);
	add_meta_box($meta_box_portfolio_video['id'], $meta_box_portfolio_video['title'], 'md_show_box_portfolio_video', $meta_box_portfolio_video['page'], $meta_box_portfolio_video['context'], $meta_box_portfolio_video['priority']);

}


/*	Callback function to show fields in meta box
/*---------------------------------------------------------------------------------------------*/


//Portfolio Detail Settings
function md_show_box_portfolio() {
	global $meta_box_portfolio, $post;
 	
	// Use nonce for verification
	echo '<input type="hidden" name="md_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #dfdfdf;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block;  margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block;  margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select id="' . $field['id'] . '" name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
		}

	}
 
	echo '</table>';
}

//Video Settings
function md_show_box_portfolio_video() {
	global $meta_box_portfolio_video, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to embed videos into your portfolio pages.', 'framework').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="md_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio_video['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 			
			//If textarea		
			case 'textarea':
				
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong></label></th>',
					'<td>';
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea><br class="clear"><p style="line-height:18px; display:block;  margin:15px 0 0 0;">'. $field['desc'].'</p>';
				
			break;
			
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block;  margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select id="' . $field['id'] . '" name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
			
		}
		
		
		
		

	}
 
	echo '</table>';
}


 
add_action('save_post', 'md_save_data_portfolio');


/*	Save data when post is edited
/*---------------------------------------------------------------------------------------------*/
 
function md_save_data_portfolio($post_id) {
	global $meta_box_portfolio, $meta_box_portfolio_video;
 
	// verify nonce
	if (!isset($_POST['md_meta_box_nonce']) ||!wp_verify_nonce($_POST['md_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($meta_box_portfolio['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	foreach ($meta_box_portfolio_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}	
}