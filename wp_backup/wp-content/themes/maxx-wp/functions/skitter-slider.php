<?php 
	
	//Get slider data from theme options
	$image1 = $data['md_home_slider_img1'];
	$image2 = $data['md_home_slider_img2'];
	$image3 = $data['md_home_slider_img3'];
	$image4 = $data['md_home_slider_img4'];
	$image5 = $data['md_home_slider_img5'];
	
	$image1_title = $data['md_home_slider_img1_title'];
	$image2_title = $data['md_home_slider_img2_title'];
	$image3_title = $data['md_home_slider_img3_title'];
	$image4_title = $data['md_home_slider_img4_title'];
	$image5_title = $data['md_home_slider_img5_title'];
	
	$image1_desc = $data['md_home_slider_img1_desc'];
	$image2_desc = $data['md_home_slider_img2_desc'];
	$image3_desc = $data['md_home_slider_img3_desc'];
	$image4_desc = $data['md_home_slider_img4_desc'];
	$image5_desc = $data['md_home_slider_img5_desc'];
	
	$image1_link = $data['md_home_slider_img1_link'];
	$image2_link = $data['md_home_slider_img2_link'];
	$image3_link = $data['md_home_slider_img3_link'];
	$image4_link = $data['md_home_slider_img4_link'];
	$image5_link = $data['md_home_slider_img5_link'];
	
	$image1_effect = $data['md_home_slider_img1_effect'];
	$image2_effect = $data['md_home_slider_img2_effect'];
	$image3_effect = $data['md_home_slider_img3_effect'];
	$image4_effect = $data['md_home_slider_img4_effect'];
	$image5_effect = $data['md_home_slider_img5_effect'];
	
	$slide_speed = $data['md_slideshow_speed'];
	$autoplay = $data['md_slide_auto_play'];	
	$show_preview = $data['md_slide_show_preview'];

	/*Slides Array*/
	$kitter_slider = array( 
		'slide1' => array(
			'image' => $image1,
			'title' => $image1_title,
			'description' => $image1_desc,
			'link' => $image1_link,
			'effect' => $image1_effect
		),
		'slide2' => array(
			'image' => $image2,
			'title' => $image2_title,
			'description' => $image2_desc,
			'link' => $image2_link,
			'effect' => $image2_effect
		),
		'slide3' => array(
			'image' => $image3,
			'title' => $image3_title,
			'description' => $image3_desc,
			'link' => $image3_link,
			'effect' => $image3_effect
		),
		'slide4' => array(
			'image' => $image4,
			'title' => $image4_title,
			'description' => $image4_desc,
			'link' => $image4_link,
			'effect' => $image4_effect
		),
		'slide5' => array(
			'image' => $image5,
			'title' => $image5_title,
			'description' => $image5_desc,
			'link' => $image5_link,
			'effect' => $image5_effect
		)
	);
	
	/*check if exist slide*/
	$check_exist_slide = 0;
	foreach($kitter_slider as $slide => $value) {
		if (!empty ($value['image'])){
			$check_exist_slide = 1;
		}
	}
	
?>   
    <!--slider-->
    <section id="slider-bg-wrapper" class="full-width-wrapper">
    	
        <?php if($data['md_enable_slider_background']){?>
        <div id="slider-bg-overlay">
        	<div id="slider-bg-overlay1"></div>
            <div id="slider-bg-overlay2"></div>
        </div>
        <?php }?>
        
        <div id="slider-shadow">
			<div class="fixed-width-wrapper">
            	<div class="box_skitter box_skitter_home maxx-theme" id="slider-wrapper">
                <?php if($check_exist_slide == 1) {// check if any slide image added in theme option, return custom slide?>
                    <ul>
                    	<?php foreach($kitter_slider as $slide => $value) {
							if (!empty ($value['image'])) {?>
                        
							<li>
                            	<?php if (!empty ($value['link'])) { ?>
                            	<a href="<?php echo $value['link']; ?>" title="<?php echo $value['title']; ?>">
                                    <img src="<?php echo $value['image'];?>" class="<?php echo $value['effect'];?>" width="940" height="370" alt="<?php echo $value['title']; ?>"/>
                                </a>
                                <?php } else { ?>
                                    <img src="<?php echo $value['image'];?>" class="<?php echo $value['effect'];?>" width="940" height="370" alt="<?php echo $value['title']; ?>"/>						
                                <?php } ?>
                                
                                <?php if (!empty ($value['title']) || !empty ($value['description'])) { ?>
                                <div class="label_text">
                                    <h1><?php echo $value['title'];?></h1>
                                    <p><?php echo stripslashes($value['description']) ?></p>
                                </div>
                                <?php }?>
                                </li>
                            </li>
						<?php }?>
                        <?php }?>
                    
                    </ul>
                <?php }else{//Else return sample slide?>
                	
                    <ul>
                        <li>
                        	<a href="#" ><img class="blind" src="<?php echo get_template_directory_uri();?>/preview-images/slide1.jpg"></a>
                            <div class="label_text"><h1>Responsive Wordpress theme</h1><p>The Corporate theme works to help you build your business with a rock-solid ...</p></div>
                        </li>
                        <li>
                        	<a href="#"><img class="circlesRotate" src="<?php echo get_template_directory_uri();?>/preview-images/slide2.jpg"></a>
                            <div class="label_text"><h1>Clean and Modern design</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p></div>
                       	</li>
                        <li>
                        	<a href="#"><img class="random" src="<?php echo get_template_directory_uri();?>/preview-images/slide3.jpg"></a>
                            <div class="label_text"><h1>Powerful Theme Options</h1><p>Nullam vel tincidunt ligula. Donec ligula mauris, vehicula quis feugiat at, consequat ut velit. </p></div>
                        </li>
                        <li>
                        	<a href="#"><img class="random" src="<?php echo get_template_directory_uri();?>/preview-images/slide4.jpg"></a>
                            <div class="label_text"><h1>Custom Built-in Shortcode with Generator</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p></div>
                        </li>
                        <li>
                        	<a href="#"><img class="random" src="<?php echo get_template_directory_uri();?>/preview-images/slide5.jpg"></a>
                            <div class="label_text"><h1>Filterable Porfolio</h1><p>Nullam vel tincidunt ligula. Donec ligula mauris, vehicula quis feugiat at, consequat ut velit. </p></div>
                        </li>
					</ul>
				
				<?php }?>
                </div>
                
            </div>
        </div>
        
        <div id="sp-slider"></div>
        <script>
		jQuery(document).ready(function(e) {
			jQuery('.box_skitter_home.maxx-theme').skitter({
				label: <?php echo isset($data['md_slider_label']) && $data['md_slider_label'] ? 'true' : 'false';?>,
				<?php if($slide_speed){?>
				interval:<?php echo $slide_speed?>, 
				<?php }?>
				numbers: true,
				<?php if($autoplay){?>
				auto_play:true,
				<?php }?>
				numbers_align: 'center',
				dots: true, 
				/*thumbs:true,*/
				<?php if($show_preview){?>
				preview: true,
				<?php }?>
				animateNumberOut: {backgroundColor:'#d1d1d1', color:'#FFF'},
				structure: 	 	'<a href="#" class="prev_button"><span><?php _e('prev','framework')?></span></a>'
								+ '<a href="#" class="next_button"><span><?php _e('next','framework')?></span></a>'
								+ '<span class="info_slide"></span>'
								+ '<div class="container_skitter">'
									+ '<div class="image">'
										+ '<a href=""><img class="image_main" /></a>'
										+ '<div class="label_skitter"></div>'
									+ '</div>'
								+ '</div>',
				animateNumberOver: {backgroundColor:'#777', color:'#FFF'},width_label: '70%',
				animateNumberActive: 	{backgroundColor:'<?php echo $data['md_primary_color'];?>', color:'#fff'},
				opacity_elements:1,
			});
            jQuery('.box_skitter_home.maxx-theme').find('.info_slide_dots .image_number').removeAttr('style');
        });
			
		
		</script>

    	
    </section>
    <!--/slider-->    