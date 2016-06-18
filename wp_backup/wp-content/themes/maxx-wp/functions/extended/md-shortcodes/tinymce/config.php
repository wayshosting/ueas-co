<?php

//PORTFOLIO TAX

$portfolioTaxTerms = get_terms( 'portfolio-type', 'hide_empty=0' );
$tax_temp = '';

foreach($portfolioTaxTerms as $term){
	$tax_temp .=  $term->name . ' - <strong>' .  $term->slug . '</strong><br>';
}  

if(empty($tax_temp)) $tax_temp = 'No Category found, Go add some first';

/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'framework'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'framework'),
				'desc' => __('Select the type, ie width of the column.', 'framework'),
				'options' => array(
				
					'one_half_first' 		=> __('1/2 First','framework'),
					'one_half' 				=> __('1/2','framework'),
					
					'one_third_first'		=> __('1/3 First','framework'),
					'one_third' 			=> __('1/3','framework'),
					'two_third_first' 		=> __('2/3 First','framework'),
					'two_third' 			=> __('2/3','framework'),
					
					'one_fourth_first'		=> __('1/4 First','framework'),
					'one_fourth' 			=> __('1/4','framework'),
					'three_fourth_first' 	=> __('3/4 First','framework'),
					'three_fourth' 			=> __('3/4','framework'),
					
					
					'one_fifth_first' 		=> __('1/5 First','framework'),
					'one_fifth' 			=> __('1/5','framework'),
					'two_fifth_first' 		=> __('2/5 First','framework'),
					'two_fifth' 			=> __('2/5','framework'),
					'three_fifth_first' 	=> __('3/5 First','framework'),
					'three_fifth' 			=> __('3/5','framework'),
					'four_fifth_first' 		=> __('4/5 First','framework'),
					'four_fifth' 			=> __('4/5','framework'),
					
					'one_sixth_first' 		=> __('1/6 First','framework'),
					'one_sixth' 			=> __('1/6','framework'),
					'five_sixth_first' 		=> __('5/6 First','framework'),
					'five_sixth' 			=> __('5/6','framework'),
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'framework'),
				'desc' => __('Add the column content.', 'framework'),
			)
		),
		'shortcode' => '[{{column}}]{{content}}[/{{column}}]',
		'clone_button' => __('Add Column', 'framework')
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'framework'),
			'desc' => __('Add the button\'s text', 'framework'),
		),
		'url' => array(
			'std' => '#',
			'type' => 'text',
			'label' => __('Button URL', 'framework'),
			'desc' => __('Add the button\'s url eg http://example.com', 'framework')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button Style', 'framework'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'framework'),
			'options' => array(
				'button' => __('Default Button (theme style)','framework'),
				'primary' => __('Primary (theme style)','framework'),
				'light' => __('Light','framework'),
				'aqua' => __('Aqua','framework'),
				'blue' => __('Blue','framework'),
				'green' => __('Green','framework'),
				'grey' => __('Grey','framework'),
				'red' => __('Red','framework'),
				'orange' => __('Orange','framework'),
				'purple' => __('Purple','framework'),
				'teal' => __('Teal','framework'),
				'readmore' => __('Read more','framework')
				
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'framework'),
			'desc' => __('Select the button\'s size', 'framework'),
			'options' => array(
				'small' => __('Small','framework'),
				'medium' => __('Medium','framework'),
				'large' => __('Large','framework')
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Button Type', 'framework'),
			'desc' => __('Select the button\'s type', 'framework'),
			'options' => array(
				'' => __('default','framework'),
				'rounded' => __('Rounded','framework')
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'framework'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'framework'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		)
	),
	'shortcode' => '[button url="{{url}}" style="{{style}}" size="{{size}}" type="{{type}}" target="{{target}}"]{{content}}[/button]',
	'popup_title' => __('Insert Button Shortcode', 'framework')
);

/*-----------------------------------------------------------------------------------*/
/*	Heading h1, h2, h3, h4, h5, h5
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['headings'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Heading Tyle', 'framework'),
			'desc' => __('Select Heading\'s type', 'framework'),
			'options' => array(
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6'
			)
			
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Heading Tyle', 'framework'),
			'desc' => __('Select Heading\'s type', 'framework'),
			'options' => array(
				'first-word' => __('First Word','framework'),
				'first-word double-color' => __('First Word & Double color','framework'),
			)
			
		),
		'content' => array(
			'std' => 'Heading Text',
			'type' => 'text',
			'label' => __('Heading\'s Text', 'framework'),
			'desc' => __('Add the Heading\'s text', 'framework'),
		),
		
		
	),
	'shortcode' => '[{{type}} style="{{style}}"]{{content}}[/{{type}}]',
	'popup_title' => __('Insert Headings Shortcode', 'framework')
);

/*-----------------------------------------------------------------------------------*/
/*	List
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['list'] = array(
	'no_preview' => true,
	'shortcode' => '[list type="{{type}}"]{{child_shortcode}}[/list]',
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('List Style', 'framework'),
			'desc' => __('Select the List style', 'framework'),
			'options' => array(
				'' => __('Default (no icon)','framework'),
				'arrow' => __('Arrow','framework'),
				'bubble' => __('Bubble','framework'),
				'bullet' => __('Bullet','framework'),
				'cross' => __('Cross','framework'),
				'doc' => __('Document','framework'),
				'info' => __('Info','framework'),
				'plus' => __('Plus','framework'),
				'star' => __('Star','framework'),
				'tick' => __('Tick','framework')
			)
		)
		
		
	),
	'child_shortcode' => array(
        'params' => array(
            'content' => array(
                'std' => 'Element Content',
                'type' => 'text',
                'label' => __('Element Content', 'framework'),
                'desc' => __('Add the Element content', 'framework')
            )
        ),
        'shortcode' => '[li]{{content}}[/li]',
        'clone_button' => __('Add element', 'framework')
    ),
	'popup_title' => __('Insert List Shortcode', 'framework'),
	
);

/*-----------------------------------------------------------------------------------*/
/*	Notification Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['notification'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Notification Style', 'framework'),
			'desc' => __('Select the notification\'s style, ie the alert colour', 'framework'),
			'options' => array(
				'light' => __('Default (Light)','framework'),
				'blue' => __('Information (Blue)','framework'),
				'yellow' => __('Attention (Yellow)','framework'),
				'green' => __('Success (Green)','framework'),
				'red' => __('Error (Red)','framework')
			)
		),
		'content' => array(
			'std' => __('Your Alert!','framework'),
			'type' => 'textarea',
			'label' => __('Alert Text', 'framework'),
			'desc' => __('Add the alert\'s text', 'framework'),
		),
		'close' => array(
			'type' => 'select',
			'options' => array(
				'true'=> __('True','framework'),
				'false' => __('False','framework')
			
			),
			'label' => __('Allow closing', 'framework'),
			'std' => '','desc' => __('Check this if you want to enable close button', 'framework'),
		)
		
	),
	'shortcode' => '[notification close="{{close}}" style="{{style}}"]{{content}}[/notification]',
	'popup_title' => __('Insert Notification Shortcode', 'framework')
);

/*-----------------------------------------------------------------------------------*/
/*	Border frame
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['borderframe'] = array(
	'no_preview' => true,
	'params' => array(
		'padding' => array(
			'type' => 'select',
			'options' => array(
				'5'=> '5px',
				'6'=> '6px',
				'7'=> '7px',
				'8'=> '8px',
				'9'=> '9px',
				'10'=> '10px'
			
			),
			'label' => __('Padding', 'framework'),
			'desc' => __('Select padding value for Border Frame (default is 5 )', 'framework'),
			
		),
		'align' => array(
			'type' => 'select',
			'options' => array(
				'alignleft'=> 'Align Left',
				'alignnone'=> 'Align None',
				'alignright'=> 'Align Right'
			
			),
			'label' => __('Alignment', 'framework')
			
		),
		'content' => array(
			'type' => 'textarea',
			'label' => __('Content', 'framework'),
			'desc' => __('Paste the content here (e.g: video shortcode or image)', 'framework')
		)
		
	),
	'shortcode' => '[border padding="{{padding}}" align="{{align}}"]{{content}}[/border]',
	'popup_title' => __('Insert Border Frame Shortcode', 'framework')
);
/*-----------------------------------------------------------------------------------*/
/*	Iconboxes
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['iconboxes'] = array(
	'no_preview' => true,
	'params' => array(
		'icon' => array(
			'type' => 'text',
			'label' => __('Icon url', 'framework'),
			'desc' => __('Place your icon url (e.g http://example.com/icon.png)', 'framework')
		),
		'heading' => array(
			'type' => 'select',
			'label' => __('Heading Tyle', 'framework'),
			'desc' => __('Select Heading\'s type', 'framework'),
			'options' => array(
				'h4' => 'h4',
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h5' => 'h5',
				'h6' => 'h6'
			)
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Title', 'framework'),
			'desc' => __('Add the heading title. ', 'framework')
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content', 'framework'),
			'desc' => __('Add the content.', 'framework'),
		)
		
	),
	'shortcode' => '[iconbox icon="{{icon}}" heading="{{heading}}" title="{{title}}"]{{content}}[/iconbox]',
	'popup_title' => __('Insert iconboxes Shortcode', 'framework')
);

/*-----------------------------------------------------------------------------------*/
/*	Iconboxes
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['iconboxes2'] = array(
	'no_preview' => true,
	'params' => array(
		'icon' => array(
			'type' => 'text',
			'label' => __('Icon url', 'framework'),
			'desc' => __('Place your icon url (e.g http://example.com/icon.png)', 'framework')
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Title', 'framework'),
			'desc' => __('Add the heading title. ', 'framework')
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content', 'framework'),
			'desc' => __('Add the content.', 'framework'),
		)
		
	),
	'shortcode' => '[iconbox2 icon="{{icon}}" title="{{title}}" description="{{description}}"]{{content}}[/iconbox2]',
	'popup_title' => __('Insert iconboxes2 Shortcode', 'framework')
);

/*-----------------------------------------------------------------------------------*/
/*	Image Lightbox
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['lightbox'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Image title', 'framework')
		),
		'thumb' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Thumbnail image URL', 'framework')
		),
		'original' => array(
			'type' => 'text',
			'label' => __('Original image URL', 'framework'),
			'desc' => __('If you leave this field empty, the Thumbnail image will be show in lightbox', 'framework')
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Alignment', 'framework'),
			'desc' => __('Choose the way you want the thumbnail image align to content', 'framework'),
			'options' => array(
				'aligncenter' => __('Align Center','framework'),
				'alignleft' => __('Align Left','framework'),
				'alignright' => __('Align Right','framework')
			)
		)
	),
	'shortcode' => '[lightbox original="{{original}}" align="{{align}}" title="{{title}}"]{{thumb}}[/lightbox]',
	'popup_title' => __('Insert Image Lightbox Shortcode', 'framework')
);


/*-----------------------------------------------------------------------------------*/
/*	Tabs, toggle, accordion
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['att'] = array(
    'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Select the type', 'framework'),
			'desc' => __('Tabs, toggles or accordions', 'framework'),
			'options' => array(
				'accordion' => __('Accordion','framework'),
				'toggle' => __('Toggle','framework'),
				'tabs' => __('Tabs','framework')
			)
		)
	),
    'no_preview' => true,
    'shortcode' => '[att_container type="{{type}}"]{{child_shortcode}}[/att_container]',
    'popup_title' => __('Insert Tabs, toggles, accordions Shortcode', 'framework'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => __('Title','framework'),
                'type' => 'text',
                'label' => __('Title', 'framework'),
                'desc' => __('Title of the Element', 'framework'),
            ),
            'content' => array(
                'std' => __('Tab Content','framework'),
                'type' => 'textarea',
                'label' => __('Content', 'framework'),
                'desc' => __('Add the Element content', 'framework')
            )
        ),
        'shortcode' => '[att_element title="{{title}}"]{{content}}[/att_element]',
        'clone_button' => __('Add more Element', 'framework')
    )
);




/*-----------------------------------------------------------------------------------*/
/*	Google Maps 
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['gmap'] = array(
    'no_preview' => true,
	'params' => array(
		'address' => array(
			'type' => 'text',
			'label' => __('Address', 'framework'),
			'desc' => __('Enter your address (e.g: Melbourne Avenue, Birmingham, United Kingdom) ', 'framework')
		),
		'maptype' => array(
			'type' => 'select',
			'label' => __('Select the Maptype', 'framework'),
			'desc' => __('HYBRID, TERRAIN, SATELLITE, ROADMAP', 'framework'),
			'options' => array(
				'ROADMAP' => __('Road Map','framework'),
				'TERRAIN' => __('Terrain','framework'),
				'HYBRID' => __('Hybrid','framework'),
				'SATELLITE' => __('Satellite','framework')
			)
		),
		'height' => array(
			'type' => 'text',
			'label' => __('Height', 'framework'),
			'desc' => __('default is 250) ', 'framework')
		),
		'image' => array(
			'type' => 'text',
			'label' => __('Image uri', 'framework'),
			'desc' => __('Enter Image uri that you want to display on map (size: 150x100)) ', 'framework')
		),
		'html' => array(
			'type' => 'text',
			'std' => __('My Hometown','framework'),
			'label' => __('HTML', 'framework'),
			'desc' => __('Short description in the Marker popup (e.g: My Hometown) ', 'framework')
		),
		'latitude' => array(
			'type' => 'text',
			'std' => '0',
			'label' => __('Latitude', 'framework'),
			'desc' => __('Enter Latitude) ', 'framework')
		),
		
		'longitude' => array(
			'type' => 'text',
			'std' => '0',
			'label' => __('Longitude', 'framework'),
			'desc' => __('Enter Longitude) ', 'framework')
		),
		'zoom' => array(
			'type' => 'text',
			'std' => '10',
			'label' => __('Zoom', 'framework'),
			'desc' => __('Zoom	(default : 10)) ', 'framework')
		),
		'control' => array(
			'type' => 'select',
			'label' => __('Show Control', 'framework'),
			'options' => array(
				'true' => __('Show','framework'),
				'false' => __('Hide','framework')
			)
		),
		'marker' => array(
			'type' => 'select',
			'label' => __('Show Marker', 'framework'),
			'options' => array(
				'false' => __('Hide','framework'),
				'true' => __('Show','framework')
			)
		),
		'popup' => array(
			'type' => 'select',
			'label' => __('Show Popup', 'framework'),
			'options' => array(
				'true' => __('Show','framework'),
				'false' => __('Hide','framework')
			)
		)
	),
    'shortcode' => '[gmap address="{{address}}" maptype="{{maptype}}" height="{{height}}" image="{{image}}" html="{{html}}" latitude="{{latitude}}" longitude="{{longitude}}" zoom="{{zoom}}" controls="{{control}}" marker="{{marker}}" popup="{{popup}}"]',
    'popup_title' => __('Insert Tabs, toggles, accordions Shortcode', 'framework'),
);


/*-----------------------------------------------------------------------------------*/
/*	Slider
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['slider'] = array(
    'params' => array(
		'effect' => array(
			'type' => 'select',
			'label' => __('Slider Effect', 'framework'),
			'options' => array(
				'slide' => __('Slide','framework'),
				'fade' => __('Fade','framework')
			)
		),
		'direction' => array(
			'type' => 'select',
			'label' => __('Slide direction', 'framework'),
			'options' => array(
				'horizontal' => __('Horizontal','framework'),
				'vertical' => __('Vertical','framework')
			)
		),
		'speed' => array(
			'type' => 'select',
			'label' => __('Slider Speed', 'framework'),
			'options' => array(
				'3000' => '3s',
				'5000' => '5s',
				'8000' => '8s',
				'10000' => '10s',
			)
		)
	),
    'no_preview' => true,
    'shortcode' => '[slider speed="{{speed}}" effect="{{effect}}" direction="{{direction}}"]{{child_shortcode}}[/slider]',
    'popup_title' => __('Insert Slider Shortcode', 'framework'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Title', 'framework'),
                'desc' => __('Text caption of slide', 'framework')
            ),
			'url' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Image URL', 'framework'),
                'desc' => __('Image URL of slide', 'framework')
            )
        ),
        'shortcode' => '[slide text="{{title}}"]{{url}}[/slide]',
        'clone_button' => __('Add more Slide', 'framework')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Testimonial
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['testimonial'] = array(
    'params' => array(
		'effect' => array(
			'type' => 'select',
			'label' => __('Slide Effect', 'framework'),
			'options' => array(
				'slide' => __('Slide','framework'),
				'fade' => __('Fade','framework')
			)
		),
		'speed' => array(
			'type' => 'select',
			'label' => __('Slider Speed', 'framework'),
			'options' => array(
				'3000' => '3s',
				'5000' => '5s',
				'8000' => '8s',
				'10000' => '10s',
			)
		)
	),
    'no_preview' => true,
    'shortcode' => '[testimonial_container speed="{{speed}}" effect="{{effect}}"]{{child_shortcode}}[/testimonial_container]',
    'popup_title' => __('Insert Testimonial Shortcode', 'framework'),
    
    'child_shortcode' => array(
        'params' => array(
			'name' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Name', 'framework')
            ),
			'position' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Position', 'framework')
            ),
			'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('Content', 'framework')
            )
        ),
        'shortcode' => '[testimonial name="{{name}}" position="{{position}}"]{{content}}[/testimonial]',
        'clone_button' => __('Add more Testimonial', 'framework')
    )
);


/*-----------------------------------------------------------------------------------*/
/*	Contact form
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['contactform'] = array(
	'no_preview' => true,
	'params' => array(
		'email' => array(
			'type' => 'text',
			'label' => __('Email to send form to', 'framework'),
			'desc' => __('Defaults to the Contact Form E-mail setting under Theme Options if not set here', 'framework'),
			'std' => ''
		),
		'subject' => array(
			'std' => '1',
			'type' => 'text',
			'label' => __('Dropcap\'s Letter: ', 'framework'),
			'desc' => __('Defaults to "Message from the contact form" if not set here', 'framework'),
		),
		
	),
	'shortcode' => '[contact_form email="{{email}}" subject="{{subject}}"]',
	'popup_title' => __('Insert Contact Form Shortcode', 'framework')
);

/*-----------------------------------------------------------------------------------*/
/*	Video embed shortcode
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['video'] = array(
	'no_preview' => false,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Video type', 'framework'),
			'options' => array(
				'youtube' => 'Youtube',
				'vimeo' => 'Vimeo'
			)
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Video code ', 'framework'),
			'desc' => __('Paste the ID of the video is hosted on, such as Youtube and Vimeo. you want to show <br>E.g. http://www.youtube.com/watch?v=<strong>tbPhf_KXNZI</strong><br>http://vimeo.com/<strong>6428069</strong>', 'framework'),
		),
		'height' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Video Height', 'framework'),
			'desc' => __('Default 300', 'framework'),
		)
		
	),
	'shortcode' => '[video type="{{type}}" height="{{height}}" id="{{id}}"]',
	'popup_title' => __('Insert Video Shortcode', 'framework')
);


/*-----------------------------------------------------------------------------------*/
/*	Rcent/Popular Posts
/*-----------------------------------------------------------------------------------*/

//Access the WordPress Categories via an Array
$sc_categories = array();  
$sc_categories_obj = get_categories();
$sc_categories[''] = "All Categories";

foreach ($sc_categories_obj as $sc_cat) {
    $sc_categories[$sc_cat->cat_ID] = $sc_cat->cat_name;
}

$zilla_shortcodes['posts'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Type of Posts', 'framework'),
			'options' => array(
				'recent' => __('Recent Post','framework'),
				'popular' => __('Popular Post','framework')
			),
			'desc' => __('Select a type of post', 'framework'),
			
		),
		'category' => array(
			'type' => 'select',
			'label' => __('Category', 'framework'),
			'options' => $sc_categories,
			'desc' => __('Select a Category you want to display', 'framework'),
			
		),
		'postcount' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Post count ', 'framework'),
			'desc' => __('Number of post you want to show (default : 3)', 'framework'),
		),
		'thumb' => array(
			'type' => 'select',
			'label' => __('Post thumbnail', 'framework'),
			'options' => array(
				'show' => __('Show','framework'),
				'hide' => __('Hide','framework')
			),
			'desc' => __('You can hide or show the thumbnail', 'framework'),
			
		),
		'excerpt' => array(
			'type' => 'select',
			'label' => __('Excerpt', 'framework'),
			'options' => array(
				'show' => __('Show','framework'),
				'hide' => __('Hide','framework')
			)
			
		),
		'excerptlength' => array(
			'type' => 'select',
			'label' => __('Excerpt Length', 'framework'),
			'options' => array(
				'20' => '20',
				'25' => '25',
				'30' => '30',
				'35' => '35',
				'40' => '40',
				'45' => '45',
			)
			
		),
		'width' => array(
			'std' => '100',
			'type' => 'text',
			'label' => __('Thumbnail width', 'framework')
		),
		'height' => array(
			'std' => '70',
			'type' => 'text',
			'label' => __('Thumbnail height', 'framework')
		)
		
	),
	'shortcode' => '[posts type="{{type}}" category="{{category}}" postcount="{{postcount}}" excerpt="{{excerpt}}" excerptlength="{{excerptlength}}" thumb="{{thumb}}" width="{{width}}" height="{{height}}"]',
	'popup_title' => __('Insert Recent / Popular Posts Shortcode', 'framework')
);


/*-----------------------------------------------------------------------------------*/
/*	Carousel Portfolio
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['cportfolio'] = array(
	'no_preview' => false,
	'params' => array(
		'columns' => array(
			'type' => 'select',
			'label' => __('Layout', 'framework'),
			'options' => array(
				'3' => __('3 Columns','framework'),
				'4' => __('4 Columns','framework')
			)
		),
		'tax' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Categories', 'framework'),
			'desc' => __('You can add the following categories (slug only, eg: identity, psd-ai). seperate by comma.if no category specified, the shortcode will list all item from all available categories<br><br>'. $tax_temp, 'framework')
		),
		'count' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Count', 'framework'),
			'desc' => __('Number of item you want to show on Carousel slider (default is unlimited)', 'framework'),
		)
		,
		'order' => array(
			'type' => 'select',
			'label' => __('Order by', 'framework'),
			'options' => array(
				'DESC' => __('Latest','framework'),
				'ASC' => __('Oldest','framework')
			)
		),
		'itemmargin' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Item margin', 'framework'),
			'desc' => __('(default is 38)', 'framework')
		),
		'thumbheight' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Height of thumbnail', 'framework'),
			'desc' => __('(default is 150)', 'framework')
		),
		'speed' => array(
			'type' => 'select',
			'label' => __('Delay ', 'framework'),
			'desc' => __('(default is 5s)', 'framework'),
			'options' => array(
				'5000' => '5s',
				'3000' => '3s',
				'8000' => '8s',
				'10000' => '10s',
			)
		)
		
		
		
	),
	'shortcode' => '[carousel_porfolio columns="{{columns}}" count="{{count}}" order="{{order}}" tax="{{tax}}" thumbheight="{{thumbheight}}" itemmargin="{{itemmargin}}"]',
	'popup_title' => __('Insert Portfolio Carousel Shortcode', 'framework')
);


/*-----------------------------------------------------------------------------------*/
/*	Pricing table
/*-----------------------------------------------------------------------------------*/
//Pricing container
$zilla_shortcodes['pricingtable'] = array(
    'params' => array(
		'columns' => array(
			'type' => 'select',
			'label' => __('Select number columns', 'framework'),
			'options' => array(
				'three' => __('Three Columns','framework'),
				'four' => __('Four Columns','framework'),
				'five' => __('Five Columns','framework'),
				'six' => __('Six Columns','framework')
			)
		)
	),
    'no_preview' => true,
    'shortcode' => '[pricing_table columns="{{columns}}"][/pricing_table]',
    'popup_title' => __('Insert Pricing Table', 'framework')
    
);

//Pricing Plan
$zilla_shortcodes['pricingplan'] = array(
    'params' => array(
		'name' => array(
			'std' => __('Plan\'s name','framework'),
			'type' => 'text',
			'label' => __('Plan\'s Name', 'framework')
		
		),
		'price' => array(
			'std' => '0$',
			'type' => 'text',
			'label' => __('Plan\'s price', 'framework')
			
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Type of plan', 'framework'),
			'options' => array(
				'normal' => __('Normal','framework'),
				'featured' => __('Featured','framework')
			)
		),
		'period' => array(
			'std' => __('Month','framework'),
			'type' => 'text',
			'label' => __('Period', 'framework'),
			'desc' => __('E.g: week, month, year', 'framework')
		
		),
		'color' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Custom Heading color', 'framework')
			
		)
	),
    'no_preview' => true,
    'shortcode' => '[pt_plan type="{{type}}" name="{{name}}" price="{{price}}" period="{{period}}" color="{{color}}"][/pt_plan]',
    'popup_title' => __('Insert Pricing Plan', 'framework')
    
);

//Pricing Features
$zilla_shortcodes['pricingfeatures'] = array(
    'params' => array(
		'heading' => array(
			'std' => __('Choose your plan','framework'),
			'type' => 'text',
			'label' => __('Heading', 'framework')
		
		),
		'description' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Short description', 'framework')
			
		)
	),
    'no_preview' => true,
    'shortcode' => '[pt_features heading="{{heading}}" description="{{description}}"][/pt_features]',
    'popup_title' => __('Insert Pricing Features', 'framework')
    
);

//feature list
$zilla_shortcodes['ptli'] = array(
    'params' => '',
    'no_preview' => true,
    'shortcode' => '{{child_shortcode}}',
    'popup_title' => __('Insert Testimonial Shortcode', 'framework'),
    
    'child_shortcode' => array(
        'params' => array(
			'content' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Content', 'framework')
            )
        ),
        'shortcode' => '[pt_li]{{content}}[/pt_li]',
        'clone_button' => __('Add more features', 'framework')
    )
);
?>