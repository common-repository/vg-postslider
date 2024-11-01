<?php
/* Post Type Register */
function vgps_posttype_register()
{
	$labels = array(
		'name' 					=> _x('VG PostSlider', 'vgps'),
		'singular_name' 		=> _x('VG PostSlider', 'vgps'),
		'add_new' 				=> _x('VG New Slider', 'vgps'),
		'add_new_item' 			=> __('VG New Slider'),
		'edit_item' 			=> __('Edit Slider'),
		'new_item' 				=> __('VG New Slider'),
		'view_item' 			=> __('VG View Slider'),
		'search_items' 			=> __('Search Slider'),
		'not_found' 			=>  __('Nothing found'),
		'not_found_in_trash' 	=> __('Nothing found in Trash'),
		'parent_item_colon' 	=> ''
	);
 
	$args = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'menu_icon' 			=> 'dashicons-update',
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_position' 		=> null,
		'supports' 				=> array('title'),		
	);

	register_post_type('vgps', $args);
}
add_action('init', 'vgps_posttype_register');


/* Meta Boxes */
function meta_boxes_vgps()
{
	$screens = array('vgps');
	foreach($screens as $screen)
	{
		add_meta_box('vgps_metabox',__('VG PostSlider Options', 'vgps'), 'meta_boxes_vgps_input', $screen);
	}
}
add_action('add_meta_boxes', 'meta_boxes_vgps');


/* Meta Boxed Input */
function meta_boxes_vgps_input($post)
{
	global $post;
	
	wp_nonce_field('meta_boxes_vgps_input', 'meta_boxes_vgps_input_nonce');
	
/* Basic Params */
	$vgps_class_sufix 	= get_post_meta($post->ID, 'vgps_class_sufix', true);
	$vgps_class_sufix	= (empty($vgps_class_sufix)) ? "" : sanitize_text_field($vgps_class_sufix);
	
	$vgps_theme 		= get_post_meta($post->ID, 'vgps_theme', true);
	$vgps_theme			= (empty($vgps_theme)) ? "default" : sanitize_text_field($vgps_theme);
	
	$vgps_override_style 	= get_post_meta($post->ID, 'vgps_override_style', true);
	$vgps_override_style	= (is_null($vgps_override_style)) ? "0" : intval($vgps_override_style);
	
	$vgps_bg_image 		= get_post_meta($post->ID, 'vgps_bg_image', true);
	$vgps_bg_image		= (empty($vgps_bg_image)) ? "" : sanitize_text_field($vgps_bg_image);
	
	$vgps_isbg_color 	= get_post_meta($post->ID, 'vgps_isbg_color', true);
	$vgps_isbg_color	= intval($vgps_isbg_color);
	
	$vgps_bg_color 		= get_post_meta($post->ID, 'vgps_bg_color', true);
	$vgps_bg_color		= (empty($vgps_bg_color)) ? "#F1F1F1" : sanitize_text_field($vgps_bg_color);
	
	$vgps_wmargin 		= get_post_meta($post->ID, 'vgps_wmargin', true);
	$vgps_wmargin		= (empty($vgps_wmargin)) ? "0px 0px" : sanitize_text_field($vgps_wmargin);
	
	$vgps_wpadding 		= get_post_meta($post->ID, 'vgps_wpadding', true);
	$vgps_wpadding		= (empty($vgps_wpadding)) ? "0px 0px" : sanitize_text_field($vgps_wpadding);
		
/* Slideshow Block */
	$vgps_is_slabel 	= get_post_meta($post->ID, 'vgps_is_slabel', true);
	$vgps_is_slabel		= (is_null($vgps_is_slabel)) ? "1" : intval($vgps_is_slabel);
	
	$vgps_slabel 		= get_post_meta($post->ID, 'vgps_slabel', true);
	$vgps_slabel		= (empty($vgps_slabel)) ? _('Headline') : sanitize_text_field($vgps_slabel);
	
	$vgps_slabel_bgcolor 	= get_post_meta($post->ID, 'vgps_slabel_bgcolor', true);
	$vgps_slabel_bgcolor	= (empty($vgps_slabel_bgcolor)) ? "#FF0000" : sanitize_text_field($vgps_slabel_bgcolor);
	
	$vgps_slabel_tcolor 	= get_post_meta($post->ID, 'vgps_slabel_tcolor', true);
	$vgps_slabel_tcolor		= (empty($vgps_slabel_tcolor)) ? "#FFFFFF" : sanitize_text_field($vgps_slabel_tcolor);
	
	$vgps_caption_bgcolor 	= get_post_meta($post->ID, 'vgps_caption_bgcolor', true);
	$vgps_caption_bgcolor	= (empty($vgps_caption_bgcolor)) ? "#000000" : sanitize_text_field($vgps_caption_bgcolor);
	
	$vgps_caption_acolor 	= get_post_meta($post->ID, 'vgps_caption_acolor', true);
	$vgps_caption_acolor	= (empty($vgps_caption_acolor)) ? "#FF0000" : sanitize_text_field($vgps_caption_acolor);
	
	$vgps_caption_tcolor 	= get_post_meta($post->ID, 'vgps_caption_tcolor', true);
	$vgps_caption_tcolor	= (empty($vgps_caption_tcolor)) ? "#FFFFFF" : sanitize_text_field($vgps_caption_tcolor);
	
	
/* Thumbnail Block */
	$vgps_thumbnail_block 	= get_post_meta($post->ID, 'vgps_thumbnail_block', true);
	$vgps_thumbnail_block	= (is_null($vgps_thumbnail_block)) ? "1" : intval($vgps_thumbnail_block);
	
	$vgps_thumb_bgcolor 	= get_post_meta($post->ID, 'vgps_thumb_bgcolor', true);
	$vgps_thumb_bgcolor		= (empty($vgps_thumb_bgcolor)) ? "#FFFFFF" : sanitize_text_field($vgps_thumb_bgcolor);
	
	$vgps_thumb_iwidth 		= get_post_meta($post->ID, 'vgps_thumb_iwidth', true);
	$vgps_thumb_iwidth		= (empty($vgps_thumb_iwidth)) ? "300" : sanitize_text_field($vgps_thumb_iwidth);
	
	$vgps_thumb_iheight 	= get_post_meta($post->ID, 'vgps_thumb_iheight', true);
	$vgps_thumb_iheight		= (empty($vgps_thumb_iheight)) ? "80" : sanitize_text_field($vgps_thumb_iheight);
	
	$vgps_thumb_pointer 	= get_post_meta($post->ID, 'vgps_thumb_pointer', true);
	$vgps_thumb_pointer		= (is_null($vgps_thumb_pointer)) ? "1" : intval($vgps_thumb_pointer);
	
	$vgps_thumb_position 	= get_post_meta($post->ID, 'vgps_thumb_position', true);
	$vgps_thumb_position	= (empty($vgps_thumb_position)) ? "bottom" : sanitize_text_field($vgps_thumb_position);
	
	$vgps_thumb_arrows 		= get_post_meta($post->ID, 'vgps_thumb_arrows', true);
	$vgps_thumb_arrows		= (is_null($vgps_thumb_arrows)) ? "1" : intval($vgps_thumb_arrows);
	
	$vgps_thumb_color 		= get_post_meta($post->ID, 'vgps_thumb_color', true);
	$vgps_thumb_color		= (empty($vgps_thumb_color)) ? "#000000" : sanitize_text_field($vgps_thumb_color);
	
	$vgps_thumb_active 		= get_post_meta($post->ID, 'vgps_thumb_active', true);
	$vgps_thumb_active		= (empty($vgps_thumb_active)) ? "#000000" : sanitize_text_field($vgps_thumb_active);
	
	$vgps_thumb_pcolor 		= get_post_meta($post->ID, 'vgps_thumb_pcolor', true);
	$vgps_thumb_pcolor		= (empty($vgps_thumb_pcolor)) ? "#FF0000" : sanitize_text_field($vgps_thumb_pcolor);
	
	
/* Slider Block */
	$vgps_width 	= get_post_meta($post->ID, 'vgps_width', true);
	$vgps_width		= (empty($vgps_width)) ? "940" : sanitize_text_field($vgps_width);
	
	$vgps_height 	= get_post_meta($post->ID, 'vgps_height', true);
	$vgps_height	= (empty($vgps_height)) ? "400" : sanitize_text_field($vgps_height);
	
	$vgps_startno 	= get_post_meta($post->ID, 'vgps_startno', true);
	$vgps_startno	= (empty($vgps_startno)) ? 0 : intval($vgps_startno);
	
	$vgps_shuffle 	= get_post_meta($post->ID, 'vgps_shuffle', true);
	$vgps_shuffle	= (is_null($vgps_shuffle)) ? 1 : intval($vgps_shuffle);
	
	$vgps_loop 		= get_post_meta($post->ID, 'vgps_loop', true);
	$vgps_loop		= (is_null($vgps_loop)) ? 1 : intval($vgps_loop);
	
	$vgps_orientation 		= get_post_meta($post->ID, 'vgps_orientation', true);
	$vgps_orientation		= (empty($vgps_orientation)) ? "horizontal" : sanitize_text_field($vgps_orientation);
	
	$vgps_slide_distance 	= get_post_meta($post->ID, 'vgps_slide_distance', true);
	$vgps_slide_distance	= (empty($vgps_slide_distance)) ? 0 : intval($vgps_slide_distance);
	
	$vgps_slide_aduration 	= get_post_meta($post->ID, 'vgps_slide_aduration', true);
	$vgps_slide_aduration	= (empty($vgps_slide_aduration)) ? 700 : intval($vgps_slide_aduration);
	
	$vgps_slide_hduration 	= get_post_meta($post->ID, 'vgps_slide_hduration', true);
	$vgps_slide_hduration	= (empty($vgps_slide_hduration)) ? 700 : intval($vgps_slide_hduration);
	
	$vgps_fade 				= get_post_meta($post->ID, 'vgps_fade', true);
	$vgps_fade				= (is_null($vgps_fade)) ? 0 : intval($vgps_fade);
	
	$vgps_fade_pslide 		= get_post_meta($post->ID, 'vgps_fade_pslide', true);
	$vgps_fade_pslide		= (is_null($vgps_fade_pslide)) ? 1 : intval($vgps_fade_pslide);
	
	$vgps_fade_duration 	= get_post_meta($post->ID, 'vgps_fade_duration', true);
	$vgps_fade_duration		= (empty($vgps_fade_duration)) ? 500 : intval($vgps_fade_duration);
	
	$vgps_autoplay 			= get_post_meta($post->ID, 'vgps_autoplay', true);
	$vgps_autoplay			= (is_null($vgps_autoplay)) ? 1 : intval($vgps_autoplay);
	
	$vgps_autoplay_delay 	= get_post_meta($post->ID, 'vgps_autoplay_delay', true);
	$vgps_autoplay_delay	= (empty($vgps_autoplay_delay)) ? 5000 : intval($vgps_autoplay_delay);
	
	$vgps_autoplay_hover 	= get_post_meta($post->ID, 'vgps_autoplay_hover', true);
	$vgps_autoplay_hover	= (empty($vgps_autoplay_hover)) ? "pause" : sanitize_text_field($vgps_autoplay_hover);
	
	$vgps_arrows 			= get_post_meta($post->ID, 'vgps_arrows', true);
	$vgps_arrows			= (is_null($vgps_arrows)) ? 1 : intval($vgps_arrows);
	
	$vgps_fade_arrows 		= get_post_meta($post->ID, 'vgps_fade_arrows', true);
	$vgps_fade_arrows		= (is_null($vgps_fade_arrows)) ? 1 : intval($vgps_fade_arrows);
	
	$vgps_touch_swipe 		= get_post_meta($post->ID, 'vgps_touch_swipe', true);
	$vgps_touch_swipe		= (is_null($vgps_touch_swipe)) ? 1 : intval($vgps_touch_swipe);
	
	$vgps_fade_caption 		= get_post_meta($post->ID, 'vgps_fade_caption', true);
	$vgps_fade_caption		= (is_null($vgps_fade_caption)) ? 0 : intval($vgps_fade_caption);
	
	$vgps_cfade_duration 	= get_post_meta($post->ID, 'vgps_cfade_duration', true);
	$vgps_cfade_duration	= (empty($vgps_cfade_duration)) ? 500 : intval($vgps_cfade_duration);
	
	$vgps_breakpoints 		= get_post_meta($post->ID, 'vgps_breakpoints', true);
	$vgps_breakpoints		= (empty($vgps_breakpoints)) ? "500: {thumbnailWidth: 120,thumbnailHeight: 75}" : sanitize_text_field($vgps_breakpoints);
	
	
/* Source Params */
	$vgps_category 			= get_post_meta($post->ID, 'vgps_category', true);
	$vgps_category			= (empty($vgps_category)) ? "all" : sanitize_text_field($vgps_category);
	$vgps_category			= explode(",", $vgps_category);
	
	$vgps_carousel_type 	= get_post_meta($post->ID, 'vgps_carousel_type', true);
	$vgps_carousel_type		= (empty($vgps_carousel_type)) ? "latest" : sanitize_text_field($vgps_carousel_type);
	
	$vgps_number_posts 		= get_post_meta($post->ID, 'vgps_number_posts', true);
	$vgps_number_posts		= (empty($vgps_number_posts)) ? 12 : intval($vgps_number_posts);
	
	$vgps_post_title 		= get_post_meta($post->ID, 'vgps_post_title', true);
	$vgps_post_title		= (is_null($vgps_post_title)) ? "1" : intval($vgps_post_title);
		
	$vgps_post_category 	= get_post_meta($post->ID, 'vgps_post_category', true);
	$vgps_post_category		= (is_null($vgps_post_category)) ? "1" : intval($vgps_post_category);
	
	$vgps_post_author 		= get_post_meta($post->ID, 'vgps_post_author', true);
	$vgps_post_author		= (is_null($vgps_post_author)) ? "1" : intval($vgps_post_author);
	
	$vgps_post_date 		= get_post_meta($post->ID, 'vgps_post_date', true);
	$vgps_post_date			= (is_null($vgps_post_date)) ? "1" : intval($vgps_post_date);
	
	$vgps_post_image 		= get_post_meta($post->ID, 'vgps_post_image', true);
	$vgps_post_image		= (is_null($vgps_post_image)) ? "1" : intval($vgps_post_image);
	
	$vgps_image_size 		= get_post_meta($post->ID, 'vgps_image_size', true);
	$vgps_image_size		= (empty($vgps_image_size)) ? "medium" : sanitize_text_field($vgps_image_size);
	
	$vgps_post_desc 		= get_post_meta($post->ID, 'vgps_post_desc', true);
	$vgps_post_desc			= (is_null($vgps_post_desc)) ? "1" : intval($vgps_post_desc);
	
	$vgps_desc_lenght 		= get_post_meta($post->ID, 'vgps_desc_lenght', true);
	$vgps_desc_lenght		= (empty($vgps_desc_lenght)) ? "200" : sanitize_text_field($vgps_desc_lenght);
	
	$vgps_readmore 			= get_post_meta($post->ID, 'vgps_readmore', true);
	$vgps_readmore			= (is_null($vgps_readmore)) ? "1" : intval($vgps_readmore);
	
	$vgps_thumb_title 		= get_post_meta($post->ID, 'vgps_thumb_title', true);
	$vgps_thumb_title		= (is_null($vgps_thumb_title)) ? "1" : intval($vgps_thumb_title);

	$vgps_thumb_date 		= get_post_meta($post->ID, 'vgps_thumb_date', true);
	$vgps_thumb_date		= (is_null($vgps_thumb_date)) ? "1" : intval($vgps_thumb_date);

	$vgps_thumb_image 		= get_post_meta($post->ID, 'vgps_thumb_image', true);
	$vgps_thumb_image		= (is_null($vgps_thumb_image)) ? "1" : intval($vgps_thumb_image);

	$vgps_thumb_image_size 	= get_post_meta($post->ID, 'vgps_thumb_image_size', true);
	$vgps_thumb_image_size	= sanitize_text_field($vgps_thumb_image_size);

	$vgps_thumb_width 		= get_post_meta($post->ID, 'vgps_thumb_width', true);
	$vgps_thumb_width		= (empty($vgps_thumb_width)) ? "100" : sanitize_text_field($vgps_thumb_width);

	$vgps_thumb_height 		= get_post_meta($post->ID, 'vgps_thumb_height', true);
	$vgps_thumb_height		= (empty($vgps_thumb_height)) ? "60" : sanitize_text_field($vgps_thumb_height);
?>
    <div class="vn-settings">
		
		<!-- Shortcode Block -->
		<div class="option-box shortcode-block">
			<p class="option-title"><?php esc_html_e("Shortcode", "vgps"); ?></p>
			<p class="option-info"><?php esc_html_e("Copy this shortcode and paste on page or post where you want to display carousel.", "vgps"); ?><br /><?php esc_html_e("Use PHP code to your themes file to display carousel.", "vgps"); ?></p>
			<textarea cols="50" rows="1" onClick="this.select();" >[vgps <?php echo 'id="'.$post->ID.'"';?>]</textarea>
			<br /><br />
			<?php esc_html_e("PHP Code", "vgps"); ?>:<br />
			<textarea cols="50" rows="1" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[vgps id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
		</div>
		
		
		<!-- Notice Message -->
		<div class="option-box notice-message" style="margin-top: 20px; color: red; font-size: 16px;">
			You're using <b>Trial Version</b>. You can buy <b>Full Version</b> here: <a target="_blank" href="http://codecanyon.net/item/vg-postslider-post-slider-for-wordpress/13823355?ref=VinaWebSolutions">http://codecanyon.net/item/x/13823355</a>.
			</a>
		</div>
		
		
		<!-- Tab Header Block -->
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active"><?php esc_html_e("Global Setting", "vgps"); ?></li>
            <li nav="2" class="nav2"><?php esc_html_e("Slider Setting", "vgps"); ?></li>
            <li nav="3" class="nav3"><?php esc_html_e("Posts Setting", "vgps"); ?></li>
        </ul>
        
		<!-- Tab Content Block -->
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
				<div class="control-group">
					<div class="control-label"><label><?php _e('Widget Class Suffix', 'vgps'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgps_class_sufix" value="<?php echo esc_attr($vgps_class_sufix); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slider Theme', 'vgps'); ?>:</label></div>
					<div class="controls">
						<select name="vgps_theme">							
							<?php
								$vgps_all_themes = vgps_get_all_themes();
								foreach($vgps_all_themes as $key => $theme) {
									echo '<option value="'.$theme.'"'.(($vgps_theme == $theme) ? ' selected="selected"' : '').'>'.$theme.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Override Theme Style', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_override_style"<?php echo !$vgps_override_style ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_override_style"<?php echo $vgps_override_style ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group hidden">
					<div class="control-label"><label><?php _e('Background Image', 'vgps'); ?>:</label></div>
					<div class="controls">
						<select name="vgps_bg_image">
							<option><?php _e('No Background', 'vgps'); ?></option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Use Background Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_isbg_color"<?php echo !$vgps_isbg_color ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_isbg_color"<?php echo $vgps_isbg_color ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Background Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_bg_color" id="vgps_bg_color" value="<?php echo esc_attr($vgps_bg_color); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Widget Margin', 'vgps'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgps_wmargin" value="<?php echo esc_attr($vgps_wmargin); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Widget Padding', 'vgps'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgps_wpadding" value="<?php echo esc_attr($vgps_wpadding); ?>" /></div>
				</div>
				
				<hr>
				<h4><i><?php _e('Customize Slideshow Block', 'vgps'); ?></i></h4>
				<div class="control-group">
					<div class="control-label"><label><?php _e('Show Slideshow Label', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_is_slabel"<?php echo !$vgps_is_slabel ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_is_slabel"<?php echo $vgps_is_slabel ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slideshow Label', 'vgps'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgps_slabel" value="<?php echo esc_attr($vgps_slabel); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Label Background Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_slabel_bgcolor" id="vgps_slabel_bgcolor" value="<?php echo esc_attr($vgps_slabel_bgcolor); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Label Text Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_slabel_tcolor" id="vgps_slabel_tcolor" value="<?php echo esc_attr($vgps_slabel_tcolor); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Caption Background Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_caption_bgcolor" id="vgps_caption_bgcolor" value="<?php echo esc_attr($vgps_caption_bgcolor); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Caption Link Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_caption_acolor" id="vgps_caption_acolor" value="<?php echo esc_attr($vgps_caption_acolor); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Caption Text Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_caption_tcolor" id="vgps_caption_tcolor" value="<?php echo esc_attr($vgps_caption_tcolor); ?>" />
					</div>
				</div>
				
				<hr>
				<h4><i><?php _e('Customize Thumbnail Block', 'vgps'); ?></i></h4>
				<div class="control-group">
					<div class="control-label"><label><?php _e('Show Thumbnail Block', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_thumbnail_block"<?php echo !$vgps_thumbnail_block ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_thumbnail_block"<?php echo $vgps_thumbnail_block ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label"><label><?php _e('Background Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_thumb_bgcolor" id="vgps_thumb_bgcolor" value="<?php echo esc_attr($vgps_thumb_bgcolor); ?>" />
					</div>
				</div>							
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Thumbnail Text Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_thumb_color" id="vgps_thumb_color" value="<?php echo esc_attr($vgps_thumb_color); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Thumbnail Active Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_thumb_active" id="vgps_thumb_active" value="<?php echo esc_attr($vgps_thumb_active); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Thumbnail Pointer Color', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_thumb_pcolor" id="vgps_thumb_pcolor" value="<?php echo esc_attr($vgps_thumb_pcolor); ?>" />
					</div>
				</div>
            </li>
			
            <li style="display: none;" class="box2 tab-box ">
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slider Max Width (Integer)', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_width" id="vgps_width" value="<?php echo esc_attr($vgps_width); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slider Max Height (Integer)', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_height" id="vgps_height" value="<?php echo esc_attr($vgps_height); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Start Slide', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_startno" id="vgps_startno" value="<?php echo esc_attr($vgps_startno); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Shuffle', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_shuffle"<?php echo !$vgps_shuffle ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_shuffle"<?php echo $vgps_shuffle ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Orientation', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="horizontal" name="vgps_orientation"<?php echo ($vgps_orientation == 'horizontal') ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Horizontal', 'vgps'); ?></label>
							<input type="radio" value="vertical" name="vgps_orientation"<?php echo ($vgps_orientation == 'vertical') ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Vertical', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Loop', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_loop"<?php echo !$vgps_loop ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_loop"<?php echo $vgps_loop ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slide Distance', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_slide_distance" id="vgps_slide_distance" value="<?php echo esc_attr($vgps_slide_distance); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slide Animation Duration', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_slide_aduration" id="vgps_slide_aduration" value="<?php echo esc_attr($vgps_slide_aduration); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Height Animation Duration', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_slide_hduration" id="vgps_slide_hduration" value="<?php echo esc_attr($vgps_slide_hduration); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Use Fade Effect', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_fade"<?php echo !$vgps_fade ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_fade"<?php echo $vgps_fade ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('FadeOut Previous Slide', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_fade_pslide"<?php echo !$vgps_fade_pslide ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_fade_pslide"<?php echo $vgps_fade_pslide ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Fade Duration', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_fade_duration" id="vgps_fade_duration" value="<?php echo esc_attr($vgps_fade_duration); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Autoplay', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_autoplay"<?php echo !$vgps_autoplay ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_autoplay"<?php echo $vgps_autoplay ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Autoplay Delay', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_autoplay_delay" id="vgps_autoplay_delay" value="<?php echo esc_attr($vgps_autoplay_delay); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Autoplay On Hover', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="pause" name="vgps_autoplay_hover"<?php echo ($vgps_autoplay_hover == 'pause') ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Pause', 'vgps'); ?></label>
							<input type="radio" value="stop" name="vgps_autoplay_hover"<?php echo ($vgps_autoplay_hover == 'stop') ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Stop', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slideshow Arrows', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_arrows"<?php echo !$vgps_arrows ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_arrows"<?php echo $vgps_arrows ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slideshow Fade Arrows', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_fade_arrows"<?php echo !$vgps_fade_arrows ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_fade_arrows"<?php echo $vgps_fade_arrows ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slideshow Touch Swipe', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_touch_swipe"<?php echo !$vgps_touch_swipe ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_touch_swipe"<?php echo $vgps_touch_swipe ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slideshow Fade Caption', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_fade_caption"<?php echo !$vgps_fade_caption ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_fade_caption"<?php echo $vgps_fade_caption ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Caption Fade Duration', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_cfade_duration" id="vgps_cfade_duration" value="<?php echo esc_attr($vgps_cfade_duration); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Thumbnail Item Width (Integer)', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_thumb_iwidth" id="vgps_thumb_iwidth" value="<?php echo esc_attr($vgps_thumb_iwidth); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Thumbnail Item Height (Integer)', 'vgps'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgps_thumb_iheight" id="vgps_thumb_iheight" value="<?php echo esc_attr($vgps_thumb_iheight); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Thumbnail Position', 'vgps'); ?>:</label></div>
					<div class="controls">
						<select name="vgps_thumb_position">							
							<?php
								$vgps_tbn_position = array('top' => _('Top'), 'right'  => _('Right'), 'bottom' => _('Bottom'), 'left' => _('Left'));
								foreach($vgps_tbn_position as $key => $position) {
									echo '<option value="'.$key.'"'.(($vgps_thumb_position == $key) ? ' selected="selected"' : '').'>'.$position.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Thumbnail Pointer', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_thumb_pointer"<?php echo !$vgps_thumb_pointer ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_thumb_pointer"<?php echo $vgps_thumb_pointer ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Thumbnail Arrows', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_thumb_arrows"<?php echo !$vgps_thumb_arrows ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_thumb_arrows"<?php echo $vgps_thumb_arrows ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Thumbnail Breakpoints', 'vgps'); ?>:</label></div>
					<div class="controls">
						<textarea name="vgps_breakpoints" id="vgps_breakpoints" rows="3" col="30" style="width: 350px; height: 75px;"><?php echo esc_attr($vgps_breakpoints); ?></textarea>						
					</div>
				</div>
            </li>
			
			
		<!-- Post Setting Block -->
            <li style="display: none;" class="box3 tab-box ">
				<div class="control-group">
					<div class="control-label"><label><?php _e('Category to Filter', 'vgps'); ?>:</label></div>
					<div class="controls">
						<select class="dropdown" name="vgps_category[]" multiple="true">						
							<option value="0"<?php echo (in_array('all', $vgps_category)) ? ' selected="selected"' : ""; ?>><?php _e('All Categories', 'vgps'); ?></option>
							<?php echo vgps_build_list_categories(0, $vgps_category); ?>							
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Carousel Type', 'vgps'); ?>:</label></div>
					<div class="controls">
						<select class="dropdown" name="vgps_carousel_type">
							<option value="latest"<?php echo ($vgps_carousel_type == 'latest') ? ' selected="selected"' : ""; ?>><?php _e('Latest Published', 'vgps'); ?></option>
							<option value="older"<?php echo ($vgps_carousel_type == 'older') ? ' selected="selected"' : ""; ?>><?php _e('Older Published', 'vgps'); ?></option>
							<option value="featured"<?php echo ($vgps_carousel_type == 'featured') ? ' selected="selected"' : ""; ?>><?php _e('Featured Posts', 'vgps'); ?></option>							
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Number of Posts', 'vgps'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgps_number_posts" value="<?php echo esc_attr($vgps_number_posts); ?>" /></div>
				</div>
				
				<hr>
				<h4><i><?php _e('Slideshow Information Block', 'vgps'); ?></i></h4>
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Title', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_post_title"<?php echo !$vgps_post_title ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_post_title"<?php echo $vgps_post_title ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Category', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_post_category"<?php echo !$vgps_post_category ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_post_category"<?php echo $vgps_post_category ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Author', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_post_author"<?php echo !$vgps_post_author ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_post_author"<?php echo $vgps_post_author ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Created Date', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_post_date"<?php echo !$vgps_post_date ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_post_date"<?php echo $vgps_post_date ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group hidden">
					<div class="control-label"><label><?php _e('Post Image', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_post_image"<?php echo !$vgps_post_image ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_post_image"<?php echo $vgps_post_image ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Image Size', 'vgps'); ?>:</label></div>
					<div class="controls">
						<select name="vgps_image_size">
							<option value="thumbnail"<?php echo ($vgps_image_size == 'thumbnail') ? ' selected="selected"' : ""; ?>><?php _e('Thumbnail', 'vgps'); ?></option>
							<option value="medium"<?php echo ($vgps_image_size == 'medium') ? ' selected="selected"' : ""; ?>><?php _e('Medium', 'vgps'); ?></option>
							<option value="large"<?php echo ($vgps_image_size == 'large') ? ' selected="selected"' : ""; ?>><?php _e('Large', 'vgps'); ?></option>
							<option value="full"<?php echo ($vgps_image_size == 'full') ? ' selected="selected"' : ""; ?>><?php _e('Full Size', 'vgps'); ?></option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Description', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_post_desc"<?php echo !$vgps_post_desc ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_post_desc"<?php echo $vgps_post_desc ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Description Lenght', 'vgps'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgps_desc_lenght" value="<?php echo esc_attr($vgps_desc_lenght); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Read More Button', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_readmore"<?php echo !$vgps_readmore ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_readmore"<?php echo $vgps_readmore ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<hr>
				<h4><i><?php _e('Thumbnail Information Block', 'vgps'); ?></i></h4>
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Title', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_thumb_title"<?php echo !$vgps_thumb_title ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_thumb_title"<?php echo $vgps_thumb_title ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Created Date', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_thumb_date"<?php echo !$vgps_thumb_date ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_thumb_date"<?php echo $vgps_thumb_date ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Image', 'vgps'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgps_thumb_image"<?php echo !$vgps_thumb_image ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgps'); ?></label>
							<input type="radio" value="1" name="vgps_thumb_image"<?php echo $vgps_thumb_image ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgps'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Image Size', 'vgps'); ?>:</label></div>
					<div class="controls">
						<select name="vgps_thumb_image_size">
							<option value="thumbnail"<?php echo ($vgps_thumb_image_size == 'thumbnail') ? ' selected="selected"' : ""; ?>><?php _e('Thumbnail', 'vgps'); ?></option>
							<option value="medium"<?php echo ($vgps_thumb_image_size == 'medium') ? ' selected="selected"' : ""; ?>><?php _e('Medium', 'vgps'); ?></option>
							<option value="large"<?php echo ($vgps_thumb_image_size == 'large') ? ' selected="selected"' : ""; ?>><?php _e('Large', 'vgps'); ?></option>
							<option value="full"<?php echo ($vgps_thumb_image_size == 'full') ? ' selected="selected"' : ""; ?>><?php _e('Full Size', 'vgps'); ?></option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Set Thumbnail Image Width', 'vgps'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgps_thumb_width" value="<?php echo esc_attr($vgps_thumb_width); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Set Thumbnail Image Height', 'vgps'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgps_thumb_height" value="<?php echo esc_attr($vgps_thumb_height); ?>" /></div>
				</div>
            </li>
        </ul>
    </div>
<?php
}

/* Meta Boxed Save */
function meta_boxes_vgps_save($post_id)
{

	// Check if our nonce is set.
	if(! isset($_POST['meta_boxes_vgps_input_nonce']))
		return $post_id;

	$nonce = $_POST['meta_boxes_vgps_input_nonce'];

	// Verify that the nonce is valid.
	if(! wp_verify_nonce($nonce, 'meta_boxes_vgps_input'))
		return $post_id;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
		return $post_id;

	
	/* OK, its safe for us to save the data now. */
	
	/* Basic Params */
	$vgps_class_sufix 	= $_POST['vgps_class_sufix'];
	$vgps_class_sufix	= (empty($vgps_class_sufix)) ? "" : sanitize_text_field($vgps_class_sufix);
	update_post_meta($post_id, 'vgps_class_sufix', $vgps_class_sufix);
	
	$vgps_theme 		= $_POST['vgps_theme'];
	$vgps_theme			= (empty($vgps_theme)) ? "default" : sanitize_text_field($vgps_theme);
	update_post_meta($post_id, 'vgps_theme', $vgps_theme);
	
	$vgps_override_style 	= $_POST['vgps_override_style'];
	$vgps_override_style	= intval($vgps_override_style);
	update_post_meta($post_id, 'vgps_override_style', $vgps_override_style);
	
	$vgps_bg_image 		= $_POST['vgps_bg_image'];
	$vgps_bg_image		= (empty($vgps_bg_image)) ? "" : sanitize_text_field($vgps_bg_image);
	update_post_meta($post_id, 'vgps_bg_image', $vgps_bg_image);
	
	$vgps_isbg_color 	= $_POST['vgps_isbg_color'];
	$vgps_isbg_color	= intval($vgps_isbg_color);
	update_post_meta($post_id, 'vgps_isbg_color', $vgps_isbg_color);
	
	$vgps_bg_color 		= $_POST['vgps_bg_color'];
	$vgps_bg_color		= (empty($vgps_bg_color)) ? "#F1F1F1" : sanitize_text_field($vgps_bg_color);
	update_post_meta($post_id, 'vgps_bg_color', $vgps_bg_color);
	
	$vgps_wmargin 		= $_POST['vgps_wmargin'];
	$vgps_wmargin		= (empty($vgps_wmargin)) ? "0px 0px" : sanitize_text_field($vgps_wmargin);
	update_post_meta($post_id, 'vgps_wmargin', $vgps_wmargin);
	
	$vgps_wpadding 		= $_POST['vgps_wpadding'];
	$vgps_wpadding		= (empty($vgps_wpadding)) ? "0px 0px" : sanitize_text_field($vgps_wpadding);
	update_post_meta($post_id, 'vgps_wpadding', $vgps_wpadding);
	
	/* Slideshow Block */
	$vgps_is_slabel = $_POST['vgps_is_slabel'];
	update_post_meta($post_id, 'vgps_is_slabel', intval($vgps_is_slabel));
	
	$vgps_slabel = $_POST['vgps_slabel'];	
	update_post_meta($post_id, 'vgps_slabel', sanitize_text_field($vgps_slabel));
	
	$vgps_slabel_bgcolor = $_POST['vgps_slabel_bgcolor'];	
	update_post_meta($post_id, 'vgps_slabel_bgcolor', sanitize_text_field($vgps_slabel_bgcolor));
	
	$vgps_slabel_tcolor = $_POST['vgps_slabel_tcolor'];	
	update_post_meta($post_id, 'vgps_slabel_tcolor', sanitize_text_field($vgps_slabel_tcolor));
	
	$vgps_caption_bgcolor = $_POST['vgps_caption_bgcolor'];	
	update_post_meta($post_id, 'vgps_caption_bgcolor', sanitize_text_field($vgps_caption_bgcolor));
	
	$vgps_caption_acolor = $_POST['vgps_caption_acolor'];	
	update_post_meta($post_id, 'vgps_caption_acolor', sanitize_text_field($vgps_caption_acolor));
	
	$vgps_caption_tcolor = $_POST['vgps_caption_tcolor'];	
	update_post_meta($post_id, 'vgps_caption_tcolor', sanitize_text_field($vgps_caption_tcolor));
	
	
	/* Thumbnail Block */
	$vgps_thumbnail_block = $_POST['vgps_thumbnail_block'];	
	update_post_meta($post_id, 'vgps_thumbnail_block', intval($vgps_thumbnail_block));
	
	$vgps_thumb_bgcolor = $_POST['vgps_thumb_bgcolor'];	
	update_post_meta($post_id, 'vgps_thumb_bgcolor', sanitize_text_field($vgps_thumb_bgcolor));
	
	$vgps_thumb_iwidth = $_POST['vgps_thumb_iwidth'];	
	update_post_meta($post_id, 'vgps_thumb_iwidth', sanitize_text_field($vgps_thumb_iwidth));
	
	$vgps_thumb_iheight = $_POST['vgps_thumb_iheight'];	
	update_post_meta($post_id, 'vgps_thumb_iheight', sanitize_text_field($vgps_thumb_iheight));
	
	$vgps_thumb_pointer = $_POST['vgps_thumb_pointer'];	
	update_post_meta($post_id, 'vgps_thumb_pointer', intval($vgps_thumb_pointer));
	
	$vgps_thumb_position = $_POST['vgps_thumb_position'];	
	update_post_meta($post_id, 'vgps_thumb_position', sanitize_text_field($vgps_thumb_position));
	
	$vgps_thumb_arrows = $_POST['vgps_thumb_arrows'];	
	update_post_meta($post_id, 'vgps_thumb_arrows', intval($vgps_thumb_arrows));
	
	$vgps_thumb_color = $_POST['vgps_thumb_color'];	
	update_post_meta($post_id, 'vgps_thumb_color', sanitize_text_field($vgps_thumb_color));
	
	$vgps_thumb_active = $_POST['vgps_thumb_active'];	
	update_post_meta($post_id, 'vgps_thumb_active', sanitize_text_field($vgps_thumb_active));
	
	$vgps_thumb_pcolor = $_POST['vgps_thumb_pcolor'];	
	update_post_meta($post_id, 'vgps_thumb_pcolor', sanitize_text_field($vgps_thumb_pcolor));
	
	
	/* Slider Params */
	$vgps_width = $_POST['vgps_width'];	
	update_post_meta($post_id, 'vgps_width', intval($vgps_width));
	
	$vgps_height = $_POST['vgps_height'];	
	update_post_meta($post_id, 'vgps_height', intval($vgps_height));
	
	$vgps_startno = $_POST['vgps_startno'];	
	update_post_meta($post_id, 'vgps_startno', intval($vgps_startno));
	
	$vgps_shuffle = $_POST['vgps_shuffle'];	
	update_post_meta($post_id, 'vgps_shuffle', intval($vgps_shuffle));
	
	$vgps_orientation = $_POST['vgps_orientation'];	
	update_post_meta($post_id, 'vgps_orientation', sanitize_text_field($vgps_orientation));
	
	$vgps_loop = $_POST['vgps_loop'];	
	update_post_meta($post_id, 'vgps_loop', intval($vgps_loop));
	
	$vgps_slide_distance = $_POST['vgps_slide_distance'];	
	update_post_meta($post_id, 'vgps_slide_distance', intval($vgps_slide_distance));
	
	$vgps_slide_aduration = $_POST['vgps_slide_aduration'];	
	update_post_meta($post_id, 'vgps_slide_aduration', intval($vgps_slide_aduration));
	
	$vgps_slide_hduration = $_POST['vgps_slide_hduration'];	
	update_post_meta($post_id, 'vgps_slide_hduration', intval($vgps_slide_hduration));
	
	$vgps_fade = $_POST['vgps_fade'];	
	update_post_meta($post_id, 'vgps_fade', intval($vgps_fade));
	
	$vgps_fade_pslide = $_POST['vgps_fade_pslide'];	
	update_post_meta($post_id, 'vgps_fade_pslide', intval($vgps_fade_pslide));
	
	$vgps_fade_duration = $_POST['vgps_fade_duration'];	
	update_post_meta($post_id, 'vgps_fade_duration', intval($vgps_fade_duration));
	
	$vgps_autoplay = $_POST['vgps_autoplay'];	
	update_post_meta($post_id, 'vgps_autoplay', intval($vgps_autoplay));
	
	$vgps_autoplay_delay = $_POST['vgps_autoplay_delay'];	
	update_post_meta($post_id, 'vgps_autoplay_delay', intval($vgps_autoplay_delay));
	
	$vgps_autoplay_hover = $_POST['vgps_autoplay_hover'];	
	update_post_meta($post_id, 'vgps_autoplay_hover', sanitize_text_field($vgps_autoplay_hover));
	
	$vgps_arrows = $_POST['vgps_arrows'];	
	update_post_meta($post_id, 'vgps_arrows', intval($vgps_arrows));
	
	$vgps_fade_arrows = $_POST['vgps_fade_arrows'];	
	update_post_meta($post_id, 'vgps_fade_arrows', intval($vgps_fade_arrows));
	
	$vgps_touch_swipe = $_POST['vgps_touch_swipe'];	
	update_post_meta($post_id, 'vgps_touch_swipe', intval($vgps_touch_swipe));
	
	$vgps_fade_caption = $_POST['vgps_fade_caption'];	
	update_post_meta($post_id, 'vgps_fade_caption', intval($vgps_fade_caption));
	
	$vgps_cfade_duration = $_POST['vgps_cfade_duration'];	
	update_post_meta($post_id, 'vgps_cfade_duration', intval($vgps_cfade_duration));
	
	$vgps_breakpoints = $_POST['vgps_breakpoints'];	
	update_post_meta($post_id, 'vgps_breakpoints', sanitize_text_field($vgps_breakpoints));	
	
	
	/* Source Params */
	$vgps_category 			= $_POST['vgps_category'];
	$vgps_category 			= (is_array($vgps_category)) ? implode(",", $vgps_category) : $vgps_category;	
	$vgps_category			= (empty($vgps_category)) ? "all" : sanitize_text_field($vgps_category);
	update_post_meta($post_id, 'vgps_category', $vgps_category);
	
	$vgps_carousel_type 	= $_POST['vgps_carousel_type'];
	$vgps_carousel_type		= (empty($vgps_carousel_type)) ? "latest" : sanitize_text_field($vgps_carousel_type);
	update_post_meta($post_id, 'vgps_carousel_type', $vgps_carousel_type);
	
	$vgps_number_posts 		= $_POST['vgps_number_posts'];
	$vgps_number_posts		= intval($vgps_number_posts);
	update_post_meta($post_id, 'vgps_number_posts', $vgps_number_posts);
	
	$vgps_post_title 		= $_POST['vgps_post_title'];
	$vgps_post_title		= intval($vgps_post_title);
	update_post_meta($post_id, 'vgps_post_title', $vgps_post_title);
		
	$vgps_post_category 	= $_POST['vgps_post_category'];
	$vgps_post_category		= intval($vgps_post_category);
	update_post_meta($post_id, 'vgps_post_category', $vgps_post_category);
		
	$vgps_post_author 		= $_POST['vgps_post_author'];
	$vgps_post_author		= intval($vgps_post_author);
	update_post_meta($post_id, 'vgps_post_author', $vgps_post_author);
	
	$vgps_post_date 		= $_POST['vgps_post_date'];
	$vgps_post_date			= intval($vgps_post_date);
	update_post_meta($post_id, 'vgps_post_date', $vgps_post_date);
	
	$vgps_post_image 		= $_POST['vgps_post_image'];
	$vgps_post_image		= intval($vgps_post_image);
	update_post_meta($post_id, 'vgps_post_image', $vgps_post_image);
	
	$vgps_image_size 		= $_POST['vgps_image_size'];
	$vgps_image_size		= (empty($vgps_image_size)) ? "medium" : sanitize_text_field($vgps_image_size);
	update_post_meta($post_id, 'vgps_image_size', $vgps_image_size);
	
	$vgps_post_desc 		= $_POST['vgps_post_desc'];
	$vgps_post_desc			= intval($vgps_post_desc);
	update_post_meta($post_id, 'vgps_post_desc', $vgps_post_desc);
	
	$vgps_desc_lenght 		= $_POST['vgps_desc_lenght'];
	$vgps_desc_lenght		= (empty($vgps_desc_lenght)) ? "200" : sanitize_text_field($vgps_desc_lenght);
	update_post_meta($post_id, 'vgps_desc_lenght', $vgps_desc_lenght);
	
	$vgps_readmore 			= $_POST['vgps_readmore'];
	$vgps_readmore			= intval($vgps_readmore);
	update_post_meta($post_id, 'vgps_readmore', $vgps_readmore);
	
	$vgps_thumb_title 		= $_POST['vgps_thumb_title'];
	$vgps_thumb_title		= intval($vgps_thumb_title);
	update_post_meta($post_id, 'vgps_thumb_title', $vgps_thumb_title);
	
	$vgps_thumb_date 		= $_POST['vgps_thumb_date'];
	$vgps_thumb_date		= intval($vgps_thumb_date);
	update_post_meta($post_id, 'vgps_thumb_date', $vgps_thumb_date);
	
	$vgps_thumb_image 		= $_POST['vgps_thumb_image'];
	$vgps_thumb_image		= intval($vgps_thumb_image);
	update_post_meta($post_id, 'vgps_thumb_image', $vgps_thumb_image);
	
	$vgps_thumb_image_size 	= $_POST['vgps_thumb_image_size'];
	$vgps_thumb_image_size	= sanitize_text_field($vgps_thumb_image_size);
	update_post_meta($post_id, 'vgps_thumb_image_size', $vgps_thumb_image_size);
	
	$vgps_thumb_width 		= $_POST['vgps_thumb_width'];
	$vgps_thumb_width		= intval($vgps_thumb_width);
	update_post_meta($post_id, 'vgps_thumb_width', $vgps_thumb_width);
	
	$vgps_thumb_height 		= $_POST['vgps_thumb_height'];
	$vgps_thumb_height		= intval($vgps_thumb_height);
	update_post_meta($post_id, 'vgps_thumb_height', $vgps_thumb_height);
}
add_action('save_post', 'meta_boxes_vgps_save');