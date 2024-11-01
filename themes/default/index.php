<?php
function vgps_body_default($post_id)
{
	global $vgps_wp_query;
	
/* Basic Params */
	$vgps_class_sufix 	= get_post_meta($post_id, 'vgps_class_sufix', true);
	$vgps_bg_image 		= get_post_meta($post_id, 'vgps_bg_image', true);	
	$vgps_isbg_color 	= get_post_meta($post_id, 'vgps_isbg_color', true);
	$vgps_bg_color 		= get_post_meta($post_id, 'vgps_bg_color', true);
	$vgps_wmargin 		= get_post_meta($post_id, 'vgps_wmargin', true);
	$vgps_wpadding 		= get_post_meta($post_id, 'vgps_wpadding', true);
	
/* Slideshow Block */
	$vgps_override_style 	= get_post_meta($post_id, 'vgps_override_style', true);
	$vgps_is_slabel 		= get_post_meta($post_id, 'vgps_is_slabel', true);
	$vgps_slabel 			= get_post_meta($post_id, 'vgps_slabel', true);
	$vgps_slabel_bgcolor 	= get_post_meta($post_id, 'vgps_slabel_bgcolor', true);
	$vgps_slabel_tcolor 	= get_post_meta($post_id, 'vgps_slabel_tcolor', true);
	$vgps_caption_bgcolor 	= get_post_meta($post_id, 'vgps_caption_bgcolor', true);
	$vgps_caption_bgcolor 	= vgps_hex_rgb($vgps_caption_bgcolor);
	$vgps_caption_acolor 	= get_post_meta($post_id, 'vgps_caption_acolor', true);
	$vgps_caption_tcolor 	= get_post_meta($post_id, 'vgps_caption_tcolor', true);
	
/* Thumbnail Block */
	$vgps_thumbnail_block 	= get_post_meta($post_id, 'vgps_thumbnail_block', true);
	$vgps_thumb_bgcolor 	= get_post_meta($post_id, 'vgps_thumb_bgcolor', true);
	$vgps_thumb_iwidth 		= get_post_meta($post_id, 'vgps_thumb_iwidth', true);
	$vgps_thumb_iheight 	= get_post_meta($post_id, 'vgps_thumb_iheight', true);
	$vgps_thumb_pointer 	= get_post_meta($post_id, 'vgps_thumb_pointer', true);
	$vgps_thumb_position 	= get_post_meta($post_id, 'vgps_thumb_position', true);
	$vgps_thumb_arrows 		= get_post_meta($post_id, 'vgps_thumb_arrows', true);
	$vgps_thumb_color 		= get_post_meta($post_id, 'vgps_thumb_color', true);
	$vgps_thumb_active 		= get_post_meta($post_id, 'vgps_thumb_active', true);
	$vgps_thumb_pcolor 		= get_post_meta($post_id, 'vgps_thumb_pcolor', true);
	
/* Slider Block */
	$vgps_width 	= get_post_meta($post_id, 'vgps_width', true);
	$vgps_height 	= get_post_meta($post_id, 'vgps_height', true);
	$vgps_startno 	= get_post_meta($post_id, 'vgps_startno', true);
	$vgps_shuffle 	= get_post_meta($post_id, 'vgps_shuffle', true);
	$vgps_loop 		= get_post_meta($post_id, 'vgps_loop', true);
	
	$vgps_orientation 		= get_post_meta($post_id, 'vgps_orientation', true);
	$vgps_slide_distance 	= get_post_meta($post_id, 'vgps_slide_distance', true);
	$vgps_slide_aduration 	= get_post_meta($post_id, 'vgps_slide_aduration', true);
	$vgps_slide_hduration 	= get_post_meta($post_id, 'vgps_slide_hduration', true);
	$vgps_fade 				= get_post_meta($post_id, 'vgps_fade', true);
	$vgps_fade_pslide 		= get_post_meta($post_id, 'vgps_fade_pslide', true);
	$vgps_fade_duration 	= get_post_meta($post_id, 'vgps_fade_duration', true);
	$vgps_autoplay 			= get_post_meta($post_id, 'vgps_autoplay', true);
	$vgps_autoplay_delay 	= get_post_meta($post_id, 'vgps_autoplay_delay', true);
	$vgps_autoplay_hover 	= get_post_meta($post_id, 'vgps_autoplay_hover', true);
	$vgps_arrows 			= get_post_meta($post_id, 'vgps_arrows', true);
	$vgps_fade_arrows 		= get_post_meta($post_id, 'vgps_fade_arrows', true);
	$vgps_touch_swipe 		= get_post_meta($post_id, 'vgps_touch_swipe', true);
	$vgps_fade_caption 		= get_post_meta($post_id, 'vgps_fade_caption', true);
	$vgps_cfade_duration 	= get_post_meta($post_id, 'vgps_cfade_duration', true);
	$vgps_breakpoints 		= get_post_meta($post_id, 'vgps_breakpoints', true);
	
	
/* Source Params */
	$vgps_category 		= get_post_meta($post_id, 'vgps_category', true);
	$vgps_carousel_type = get_post_meta($post_id, 'vgps_carousel_type', true);
	$vgps_number_posts 	= get_post_meta($post_id, 'vgps_number_posts', true);
	$vgps_post_title 	= get_post_meta($post_id, 'vgps_post_title', true);
	$vgps_post_category = get_post_meta($post_id, 'vgps_post_category', true);
	$vgps_post_author 	= get_post_meta($post_id, 'vgps_post_author', true);
	$vgps_post_date 	= get_post_meta($post_id, 'vgps_post_date', true);
	$vgps_post_image 	= get_post_meta($post_id, 'vgps_post_image', true);
	$vgps_image_size 	= get_post_meta($post_id, 'vgps_image_size', true);
	$vgps_post_desc 	= get_post_meta($post_id, 'vgps_post_desc', true);
	$vgps_desc_lenght 	= get_post_meta($post_id, 'vgps_desc_lenght', true);
	$vgps_readmore 		= get_post_meta($post_id, 'vgps_readmore', true);
	
	$vgps_thumb_title 		= get_post_meta($post_id, 'vgps_thumb_title', true);
	$vgps_thumb_date 		= get_post_meta($post_id, 'vgps_thumb_date', true);
	$vgps_thumb_image 		= get_post_meta($post_id, 'vgps_thumb_image', true);
	$vgps_thumb_image_size 	= get_post_meta($post_id, 'vgps_thumb_image_size', true);
	$vgps_thumb_width 		= get_post_meta($post_id, 'vgps_thumb_width', true);
	$vgps_thumb_height 		= get_post_meta($post_id, 'vgps_thumb_height', true);
	
	/* Query Data */
	switch($vgps_carousel_type) {
		case "older":
			$args = array(
				'post_status' 		=> 'publish',
				'orderby' 			=> 'date',
				'order' 			=> 'ASC',
				'posts_per_page' 	=> $vgps_number_posts,
			);
			$args = ($vgps_category == 'all') ? $args : array_merge($args, array("cat" => $vgps_category));
		break;
		case "featured":
			$args = array(
				'post_status' 	=> 'publish',
				'meta_query' 	=> array(
					array(
						'key' 	=> '_featured',
						'value' => 'yes',
				)),
				'posts_per_page' 	=> $vgps_number_posts,
			);
			$args = ($vgps_category == 'all') ? $args : array_merge($args, array("cat" => $vgps_category));
		break;		
		case "latest":
		default:
			$args = array(
				'post_status' 		=> 'publish',
				'orderby' 			=> 'date',
				'order' 			=> 'DESC',
				'posts_per_page' 	=> $vgps_number_posts,
			);
			$args = ($vgps_category == 'all') ? $args : array_merge($args, array("cat" => $vgps_category));
		break;
	}
	$vgps_wp_query 		= new WP_Query($args);
	$vgps_total_items 	= count($vgps_wp_query->posts);
	
	/* Start HTML & CSS & Javascript */
	$vgps_css = $vgps_html = $vgps_thumbnail = $vgps_script = '';
	
	
	/* CSS Block */
	if($vgps_total_items && $vgps_override_style)
	{
		$vgps_css = '
		<style type="text/css">
		#vgps-wrapper'.$post_id.' {
			margin: '.$vgps_wmargin.';
			padding: '.$vgps_wpadding.';'.
			(($vgps_isbg_color) ? 'background-color: '.$vgps_bg_color.';' : '') .'
		}
		#vgps-wrapper'.$post_id.' .vgps-label {
			background-color: '.$vgps_slabel_bgcolor.';
			color: '.$vgps_slabel_tcolor.';
		}
		#vgps-wrapper'.$post_id.' .vgps-caption {
			background: rgba('.$vgps_caption_bgcolor.', 0) linear-gradient(to bottom, rgba('.$vgps_caption_bgcolor.', 0) 0%, rgba('.$vgps_caption_bgcolor.', 0.8) 100%) repeat scroll 0 0;
			color: '.$vgps_caption_tcolor.';
		}
		#vgps-wrapper'.$post_id.' .vgps-caption a {
			color: '.$vgps_caption_acolor.';	
		}
		#vgps-wrapper'.$post_id.' .vgps-thumbnails {
			background-color: '.$vgps_thumb_bgcolor.';
			color: '.$vgps_thumb_color.';
		}
		#vgps-wrapper'.$post_id.' .sp-selected-thumbnail {
			color: '.$vgps_thumb_active.';
		}
		#vgps-wrapper'.$post_id.' .sp-selected-thumbnail::before {
			border-bottom: 5px solid '.$vgps_thumb_pcolor.';
		}
		</style>';
	}
	
	
	/* HTML Block */
	$vgps_html .= '<div id="vgps-wrapper'.$post_id.'" class="vgps-wrapper theme-default'.$vgps_class_sufix.'">';
		if($vgps_total_items)
		{
			/* Main Slider Items Block */
			$vgps_html .= '<div class="sp-slides">';
			foreach($vgps_wp_query->posts as $item)
			{
				$vgps_post_id = $item->ID;
				if(!isset($vgps_post_id)) continue;				
				$vgps_wp_query->the_post($vgps_post_id); global $post;
				
				$vgps_main_image 	= wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $vgps_image_size);
				$vgps_main_iurl 	= $vgps_main_image['0'];
				$vgps_desc      	= vgps_substrwords($post->post_content, $vgps_desc_lenght);
				$vgps_categories 	= vgps_get_categories(get_the_ID());
				$vgps_post_created	= date("F d, Y", strtotime($post->post_date));
				$vgps_title_attr	= get_the_title();		
				
				/* Main Slider Item Block */
				$vgps_html .= '<div class="sp-slide">';
					$vgps_html .= '<img class="sp-image" alt="'.$vgps_title_attr.'" src="'.$vgps_main_iurl.'" data-src="'.$vgps_main_iurl.'" />';
					$vgps_html .= ($vgps_is_slabel) ? '<div class="sp-layer sp-padding vgps-label" data-position="topLeft">'.$vgps_slabel.'</div>' : "";
					
					if($vgps_post_title || $vgps_post_desc || $vgps_readmore)
					{
						$vgps_html .= '<div class="sp-layer sp-padding vgps-caption" data-position="bottomLeft" data-show-transition="up" data-hide-transition="down" data-show-delay="600" data-hide-delay="100">';
							$vgps_html .= ($vgps_post_title) ? '<h3 class="news-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>' : "";
							if($vgps_post_category || $vgps_post_author || $vgps_post_date)
							{
								$vgps_html .= '<div class="news-meta entry-meta hide-small-screen">';
									$vgps_html .= ($vgps_post_date) ? '<span class="date"><a rel="bookmark" href="'.get_permalink().'" title="'.get_the_title().'">'.$vgps_post_created.'</a></span>' : "";
									$vgps_html .= ($vgps_post_category) ? '<span class="categories-links">'.$vgps_categories.'</span>' : "";
									$vgps_html .= ($vgps_post_author) ? '<span class="author vcard"><a href="'.esc_url(get_the_author_meta('url')).'">'.get_the_author().'</a></span>' : "";
								$vgps_html .= '</div>';
							}
							$vgps_html .= ($vgps_post_desc) ? '<div class="news-description hide-small-screen">'.$vgps_desc.'</div>' : "";
							$vgps_html .= ($vgps_readmore) ? '<a href="'.get_permalink().'" class="readmore hide-small-screen">'.__("Read more...", "vgps").'</a>' : "";
						$vgps_html .= '</div>';
					}
					
				$vgps_html .= '</div>';

				/* Build Thumbnail Item Information */
				$vgps_thumb_images 	= wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $vgps_thumb_image_size);
				$vgps_thumb_iurl 	= $vgps_thumb_images['0'];				
				
				if($vgps_thumbnail_block && ($vgps_thumb_title || $vgps_thumb_date || $vgps_thumb_image))
				{
					$vgps_thumbnail .= '<div class="sp-thumbnail">';
						$vgps_thumbnail .= '<div class="sp-thumbnail-image-container">';
							$vgps_thumbnail .= ($vgps_thumb_image) ? '<img src="'.$vgps_thumb_iurl.'" alt="'.$vgps_title_attr.'" width="'.$vgps_thumb_width.'" height="'.$vgps_thumb_height.'" />' : "";
							
							if($vgps_thumb_title || $vgps_thumb_date)
							{
								$vgps_thumbnail .= '<div class="sp-thumbnail-text hide-small-screen">';
									$vgps_thumbnail .= ($vgps_thumb_title) ? '<div class="sp-thumbnail-title">'.get_the_title().'</div>' : "";
									$vgps_thumbnail .= ($vgps_thumb_date) ? '<div class="sp-thumbnail-description">'.$vgps_post_created.'</div>' : "";
								$vgps_thumbnail .= '</div>';
							}							
							
						$vgps_thumbnail .= '</div>';
					$vgps_thumbnail .= '</div>';
				}
			}			
			$vgps_html .= '</div>';
			
			/* Echo Thumbnail Items Block */
			$vgps_html .= ($vgps_thumbnail_block && ($vgps_thumb_title || $vgps_thumb_date || $vgps_thumb_image)) ? '<div class="sp-thumbnails vgps-thumbnails">'.$vgps_thumbnail.'</div>' : '';
			
			/* Reset Post */
			$post = "";
		}
		else
		{
			return "No item found. Please check your config!";
		}
	$vgps_html .= '</div>';
	
	/* Reset Query */
	wp_reset_postdata();
	
	/* Javascript Block */
	if($vgps_total_items)
	{
		$vgps_script = '
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("#vgps-wrapper'.$post_id.'").sliderPro({
				width					: 	'.$vgps_width.',
				height					: 	'.$vgps_height.',
				startSlide				: 	'.$vgps_startno.',
				shuffle					: 	'.($vgps_shuffle ? 'true' : 'false').',
				orientation				: 	"'.$vgps_orientation.'",
				forceSize				: 	"none",
				loop					: 	'.($vgps_loop ? 'true' : 'false').',
				slideDistance			: 	'.$vgps_slide_distance.',
				slideAnimationDuration	: 	'.$vgps_slide_aduration.',
				heightAnimationDuration	: 	'.$vgps_slide_hduration.',
				fade					: 	'.($vgps_fade ? 'true' : 'false').',
				fadeOutPreviousSlide	: 	'.($vgps_fade_pslide ? 'true' : 'false').',
				fadeDuration			: 	'.$vgps_fade_duration.',
				autoplay				: 	'.($vgps_autoplay ? 'true' : 'false').',
				autoplayDelay			: 	'.$vgps_autoplay_delay.',
				autoplayOnHover			: 	"'.$vgps_autoplay_hover.'",
				arrows					: 	'.($vgps_arrows ? 'true' : 'false').',
				fadeArrows				: 	'.($vgps_fade_arrows ? 'true' : 'false').',
				touchSwipe				: 	'.($vgps_touch_swipe ? 'true' : 'false').',
				fadeCaption				: 	'.($vgps_fade_caption ? 'true' : 'false').',
				captionFadeDuration		: 	'.$vgps_cfade_duration.',
				thumbnailWidth			: 	'.$vgps_thumb_iwidth.',
				thumbnailHeight			: 	'.$vgps_thumb_iheight.',
				thumbnailsPosition		: 	"'.$vgps_thumb_position.'",
				thumbnailPointer		: 	'.($vgps_thumb_pointer ? 'true' : 'false').',
				thumbnailArrows			: 	'.($vgps_thumb_arrows ? 'true' : 'false').',
				buttons: false,
				autoScaleLayers: false,
				breakpoints: {
					'.$vgps_breakpoints.'
				}
			});
		});
		</script>';
	}
	
	return $vgps_css . $vgps_html . $vgps_script;
}