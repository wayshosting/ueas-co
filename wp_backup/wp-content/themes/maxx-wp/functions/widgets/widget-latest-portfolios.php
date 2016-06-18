<?php

/*
	Plugin Name: Latest Portfolio widget
	Description: A widget that displays the latest portfolio
*/

/*Register Widget
/*---------------------------------------------------------------------------------------------*/
function md_latest_portfolios_widget() {
	register_widget( 'MD_Latest_Portfolios_Widget' );
}
add_action( 'widgets_init', 'md_latest_portfolios_widget' );

/*Widget class.
/*---------------------------------------------------------------------------------------------*/
class md_latest_portfolios_widget extends WP_Widget {

/*Widget Setup
/*---------------------------------------------------------------------------------------------*/
	
function MD_Latest_Portfolios_Widget() {

	// Widget settings
	$widget_ops = array( 'classname' => 'md_latest_portfolios_widget','description' => __('Displays your latest portfolios.', 'framework'));

	// Widget control settings
	$control_ops = array( 'id_base' => 'md_latest_portfolios_widget' );

	// Create the widget
	$this->WP_Widget( 'md_latest_portfolios_widget', __('Maxx: Latest Portfolios', 'framework'), $widget_ops, $control_ops );
}


/*Display Widget
/*---------------------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );
	
	//Our variables from the widget settings.
	$title = apply_filters('widget_title', $instance['title'] );
	$number = ( isset($instance['number']) ) ? $instance['number'] : 0;
	$desc = $instance['desc'];

	// Before widget
	echo $before_widget;

	//Display the widget title if one was input
	if ( $title ) { echo $before_title . $title . $after_title; }
?>
		
	<div class="md-latest-portfolios-widget">      
		<?php if( !empty($desc) ) { echo "<p>$desc</p>"; } ?>
		
		
			
		<?php 
			$args = array(
				'posts_per_page' => $number,
				'order' => 'DESC',
				'ignore_sticky_posts' => 1,
				'post_type' => 'portfolio'
			);
		
			$posts_query = new WP_Query( $args );
			
			
			if( $posts_query->have_posts() ) : while( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
            
            	<?php
				
				global $data,$post;
				$porfolio_featured_image_height = $data['md_porfolio_featured_image_height'];
				
				$post_id = $post->ID;
				
				$terms = get_the_terms($post_id, 'portfolio-type' );
				
				/*Get the thumbnail url*/
				$image_id = get_post_thumbnail_id();
				$image_url = wp_get_attachment_image_src($image_id,'full', true);
				
				//Custom feature image from theme option
				$feature_image_url = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post_id ), 'portfolio-thumb' );

				$feature_image_resized = '';
				if($porfolio_featured_image_height){
					$feature_image_resized = '/functions/thumb.php?src=' . $feature_image_url[0].'&w=282&h='.$porfolio_featured_image_height;
				}
				
				//Get the data from custom metabox field 
				$media_type = get_post_meta($post_id, 'md_portfolio_type', true);				
				$video_type = get_post_meta($post_id, 'md_video_type', true);				
				$video_embed_code_id = get_post_meta($post_id, 'md_portfolio_video_embed_code_id', true);	
				
				$current_video_link = "";
				
				if($video_type == 'Vimeo'){
					$current_video_link = 'http://vimeo.com/'.$video_embed_code_id;
				}
				else{
					$current_video_link = 'http://www.youtube.com/watch?v='.$video_embed_code_id;
				}
				 ?>
                
				<article class="project-entry <?php if($terms) : foreach ($terms as $term) { echo 'term'.$term->term_id.' '; } endif; ?>" id="post-<?php the_ID(); ?>">
				<?php if ( has_post_thumbnail()) { ?> 
                    <a href="<?php if(($media_type == 'video') && ($video_embed_code_id != "") ){?><?php echo $current_video_link ?><?php }else{?><?php echo $image_url[0]; ?><?php }?>" title="<?php the_title(); ?>" rel="prettyPhoto[<?php  echo 'term'.$term->term_id; ?>]"  class="img-border preloading-light float-left align-none project-thumbnail <?php echo $media_type;?>-preview">
					<?php if($porfolio_featured_image_height){?>
						<img src="<?php echo get_template_directory_uri() . $feature_image_resized;?>" alt="<?php the_title(); ?>">
                    <?php }else{?>
                        <?php the_post_thumbnail('portfolio-thumb'); ?>	
                    <?php }?>
                    </a>
				<?php }?>
                <div class="clear"></div>
                <h4 class="cufon first-word"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                
				
				<p><?php // get the portfolio category
					$cats = array();
					if( is_array($terms) ) {
					foreach ( $terms as $term ) {
						$cats[] = $term->name;
						$cats_link = get_term_link($term->slug,'portfolio-type');
						
					}}
					$cat = join( ", ", $cats );
					echo $cat;
				?></p>
				

				</article>
			<?php endwhile; endif; wp_reset_postdata(); ?>

		
		
	</div><!-- / .md-latest-portfolios-widget -->

<?php

	/* After widget (defined by themes). */
	echo $after_widget;
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['desc'] = strip_tags( $new_instance['desc'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		/* No need to strip tags for.. */

		return $instance;
	}
	

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => 'Latest Work',
		'desc' => 'Place some short description about your work here.',
		'number' => 4
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of item:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
		
    	<p>
    		<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Short Description:', 'framework') ?></label>
    		<textarea class="widefat" rows="5" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" ><?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?></textarea>
    	</p>

	
	<?php
	}
}
?>