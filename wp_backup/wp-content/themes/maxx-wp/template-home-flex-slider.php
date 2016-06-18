<?php
/*
 *Template Name: Home Page Flexslider
 *
 * @package WordPress
 * @subpackage Maxx
 */

?>

<?php get_header()?>

<?php 
	
	//Get slider data from theme options
	$image1 = $data['md_home_flexslider_img1'];
	$image2 = $data['md_home_flexslider_img2'];
	$image3 = $data['md_home_flexslider_img3'];
	$image4 = $data['md_home_flexslider_img4'];
	$image5 = $data['md_home_flexslider_img5'];
	
	$image1_link = $data['md_home_flexslider_img1_link'];
	$image2_link = $data['md_home_flexslider_img2_link'];
	$image3_link = $data['md_home_flexslider_img3_link'];
	$image4_link = $data['md_home_flexslider_img4_link'];
	$image5_link = $data['md_home_flexslider_img5_link'];
	
	$slide1_enable_video = $data['md_home_flexslider_img1_video_enable'];
	$slide2_enable_video = $data['md_home_flexslider_img2_video_enable'];
	$slide3_enable_video = $data['md_home_flexslider_img3_video_enable'];
	$slide4_enable_video = $data['md_home_flexslider_img4_video_enable'];
	$slide5_enable_video = $data['md_home_flexslider_img5_video_enable'];
	
	$slide1_video_type = $data['md_home_flexslider_img1_video_source'];
	$slide2_video_type = $data['md_home_flexslider_img2_video_source'];
	$slide3_video_type = $data['md_home_flexslider_img3_video_source'];
	$slide4_video_type = $data['md_home_flexslider_img4_video_source'];
	$slide5_video_type = $data['md_home_flexslider_img5_video_source'];
	
	
	$slide1_video_id = $data['md_home_flexslider_img1_video_source_id'];
	$slide2_video_id = $data['md_home_flexslider_img2_video_source_id'];
	$slide3_video_id = $data['md_home_flexslider_img3_video_source_id'];
	$slide4_video_id = $data['md_home_flexslider_img4_video_source_id'];
	$slide5_video_id = $data['md_home_flexslider_img5_video_source_id'];
	
	
	$animate_effect = $data['md_home_flexslider_animation'];
	$slide_speed = $data['md_home_flexslider_slide_speed'];
	$animate_speed = $data['md_home_flexslider_animate_speed'];
	$control_nav = $data['md_home_flexslider_control_nav'];

	/*Slides Array*/
	$flex_slider = array( 
		'slide1' => array(
			'image' => $image1,
			'link' => $image1_link,
			'video_enable' => $slide1_enable_video,
			'video_type' => $slide1_video_type,
			'video_id' => $slide1_video_id
		),
		'slide2' => array(
			'image' => $image2,
			'link' => $image2_link,
			'video_enable' => $slide2_enable_video,
			'video_type' => $slide2_video_type,
			'video_id' => $slide2_video_id
		),
		'slide3' => array(
			'image' => $image3,
			'link' => $image3_link,
			'video_enable' => $slide3_enable_video,
			'video_type' => $slide3_video_type,
			'video_id' => $slide3_video_id
		),
		'slide4' => array(
			'image' => $image4,
			'link' => $image4_link,
			'video_enable' => $slide4_enable_video,
			'video_type' => $slide4_video_type,
			'video_id' => $slide4_video_id
		),
		'slide5' => array(
			'image' => $image5,
			'link' => $image5_link,
			'video_enable' => $slide5_enable_video,
			'video_type' => $slide5_video_type,
			'video_id' => $slide5_video_id
		)
	);
	
	/*check if exist slide*/
	$check_exist_slide = 0;
	foreach($flex_slider as $slide => $value) {
		if (!empty ($value['image'])){
			$check_exist_slide = 1;
		}
		//echo $value['video_enable'];
	}
	
	

	
?>


<style>
#wrap-all{
	background-position:center 300px;
}
</style>  
	<!--slider-->
    <section id="slider-bg-wrapper" class="full-width-wrapper">
    	
        <?php if($data['md_enable_slider_background']){?>
        <div id="slider-bg-overlay">
        	<div id="slider-bg-overlay1"></div>
            <div id="slider-bg-overlay2"></div>
        </div>
        <?php }?>
         
        <div id="slider-shadow" class="slider-shadow2">
			<div class="fixed-width-wrapper">
        
            	<div class="home-flex-slider flexslider" id="slider-wrapper">
					<?php if($check_exist_slide == 1) {$i=0; ?>
                    
                    <ul class="slides">
                    	<?php foreach($flex_slider as $slide => $value) {
							
							 
							if (!empty ($value['image'])) {?>
                            <?php $i++;?>
                        	
							<li   <?php if($value['video_enable'] == '1'){ echo 'id="slideId' . $i .'"';}?> data-thumb="<?php echo get_template_directory_uri() . '/functions/thumb.php?src=' . $value['image'] .'&w=90&h=50'?>">
                            
                            <?php  if($value['video_enable'] == 0 || ($value['video_enable'] == 1 && $value['video_id'] == '' ) ){?>
                            	
								<?php if (!empty ($value['link'])) { ?>
                            	<a href="<?php echo $value['link']; ?>">
                                    <img src="<?php echo $value['image'];?>"/>
                                </a>
                                
                                <?php } else { ?>
                                    <img src="<?php echo $value['image'];?>"/>						
                                <?php } ?>
                                
                            <?php }else{ ?>
                            	
								<?php if($value['video_type'] == 'youtube'){ ?>
                                
									<iframe class="video_slide youtube" src="http://www.youtube.com/embed/<?php echo $value['video_id']; ?>?enablejsapi=1&wmode=transparent&color=blue&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
                                    
                                    
                                    
								<?php }else {?>
									<iframe id="vimeo_id<?php echo $i;?>" class="video_slide vimeo" src="http://player.vimeo.com/video/<?php echo $value['video_id']; ?>?title=0&amp;byline=0&amp;portrait=0&amp;api=1&amp;player_id=player_1&amp;color=ffffff" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            	<?php } ?> 
                            
                            <?php } ?> 
                            </li>
						<?php }?>
                        
                        
                    <?php }?>
                    </ul>
                    
					<?php }else{?>
                	<ul class="slides">
                        <li id="slideId1" data-thumb="<?php echo get_template_directory_uri() . '/functions/thumb.php?src=' .get_template_directory_uri().'/preview-images/slide1.jpg&w=90&h=50'?>">
                        	<a href="#"><img src="<?php echo get_template_directory_uri()?>/preview-images/slide1.jpg"></a>
                        </li>
                        <li id="slideId2" data-thumb="<?php echo get_template_directory_uri() . '/functions/thumb.php?src=' .get_template_directory_uri().'/preview-images/slide2.jpg&w=90&h=50'?>">
                            <iframe class="video_slide youtube" src="http://www.youtube.com/embed/fwgzYNYoqPY?enablejsapi=1&wmode=transparent&controls=0" frameborder="0" allowfullscreen></iframe>
                       	</li>
                        <li id="slideId3" data-thumb="<?php echo get_template_directory_uri() . '/functions/thumb.php?src=' .get_template_directory_uri().'/preview-images/slide3.jpg&w=90&h=50'?>">
                        	<a href="#"><img src="<?php echo get_template_directory_uri();?>/preview-images/slide3.jpg"></a>
                        </li>
                        <li id='videoId4' data-thumb="<?php echo get_template_directory_uri() . '/functions/thumb.php?src=' .get_template_directory_uri().'/preview-images/slide4.jpg&w=90&h=50'?>">
                        	<iframe class="video_slide youtube" src="http://www.youtube.com/embed/CxRMFwPpkBE?enablejsapi=1&wmode=transparent&controls=0" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li id="slideId5" data-thumb="<?php echo get_template_directory_uri() . '/functions/thumb.php?src=' .get_template_directory_uri().'/preview-images/slide5.jpg&w=90&h=50'?>">
                        	<a href="#"><img src="<?php echo get_template_directory_uri();?>/preview-images/slide5.jpg"></a>
                        </li>
					</ul>
					<?php }?>
                </div>
                
            </div>
        </div>
        

        
        <div id="sp-slider"></div>
        
    	
    </section>
    <!--/slider-->
    <script type="text/javascript">
		
		jQuery(window).load(function() {
			jQuery('.home-flex-slider').fitVids().flexslider({
				animation: "<?php echo $animate_effect;?>",
				<?php if($control_nav == 'thumbnails'){ echo 'controlNav: "thumbnails",';} ?>
				directionNav:false,
				<?php if($slide_speed){ echo 'slideshowSpeed:' . $slide_speed . ','; }else{ echo 'slideshowSpeed:3000,';} ?>
				<?php if($animate_speed){ echo 'animationSpeed:' . $animate_speed . ','; }?>
				  useCSS: false,
				  animationLoop: true,
				  smoothHeight: true,
				/*after:slideAfter,*/
				//before:slideBefore,
				before:slideBefore,
				pauseOnHover: true
			});

			
			
		function slideBefore($) {
				//$f(player).api('pause');	
				//callPlayer('slideId1',"pauseVideo");
//				callPlayer('slideId2',"pauseVideo");
//				callPlayer('slideId3',"pauseVideo");
//				callPlayer('slideId4',"pauseVideo");
//				callPlayer('slideId5',"pauseVideo"); 
				
				
				<?php $j=0;  foreach($flex_slider as $slide => $value) { 
					
					if (!empty ($value['image'])) { $j++;?>
					
					<?php  if($value['video_enable'] == 1 && $value['video_id'] != ''  ){?>
						<?php if ($value['video_type'] == 'youtube'){?>
							callPlayer('slideId<?php echo $j;?>',"pauseVideo");
						<?php }else{?>
							player<?php echo $j;?> = $f(document.getElementById('vimeo_id<?php echo $j;?>'));
							player<?php echo $j;?>.api('pause');
						<?php }?>
						
					
				<?php 	}
					}
				}
				
				?>
				
				

		};
		
		// Vimeo API nonsense
			
		
		});
		  
//		function slideAfter(slider) {
//			
//			
//			var thisSlide = slider.slides.eq(slider.currentSlide);
//				thisSlide.attr('id','visibleVideo');
//				//alert('start')
//		}

		
		  
	</script>    

    
    
    <script type='text/javascript'>//<![CDATA[ 
	

	/*
	 * @author       Rob W (http://stackoverflow.com/a/7513356/938089
	 * @description  Executes function on a framed YouTube video (see previous link)
	 *               For a full list of possible functions, see:
	 *               http://code.google.com/apis/youtube/js_api_reference.html
	 * @param String frame_id The id of (the div containing) the frame
	 * @param String func     Desired function to call, eg. "playVideo"
	 * @param Array  args     (optional) List of arguments to pass to function func*/


	function callPlayer(frame_id, func, args) {
		if (window.jQuery && frame_id instanceof jQuery) frame_id = frame_id.get(0).id;
		var iframe = document.getElementById(frame_id);
		if (iframe && iframe.tagName.toUpperCase() != 'IFRAME') {
			iframe = iframe.getElementsByTagName('iframe')[0];
		}
		if (iframe) {
			// Frame exists, 
			iframe.contentWindow.postMessage(JSON.stringify({
				"event": "command",
				"func": func,
				"args": args || [],
				"id": frame_id
			}), "*");
		}
	}
	//]]>  
	
	
	</script>
    
    <!--main content-->
    <div id="main-content-wrapper" class="fixed-width-wrapper home-page" >
    
    	<!--Content-->
    	<div class="entry-content" >
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!--post entry-->
            <article class="post-entry" id="post-<?php the_ID(); ?>">
				<?php the_content();?>
                <?php wp_link_pages(
                    array(
                        'before' => '<div class="link-pages"><strong>'.__('Pages:', 'framework').'</strong> ', 
                        'after' => '</div>', 
                        'next_or_number' => 'number',
                        'nextpagelink'     => __('Next &rarr;', 'framework'),
						'previouspagelink'     => __('&larr; Prev', 'framework')
                    )
                );?>
            </article>
            <!--/post entry-->
            <?php endwhile; endif; ?>    
        </div>
        <!--/Content-->
        
        
    </div>
    <!--/main content-->
    
    <div class="clear"></div>
   

<?php get_footer()?>