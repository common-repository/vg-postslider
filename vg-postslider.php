<?php
/*
Plugin Name: VG PostSlider
Plugin URI: http://themeforest.net/user/vinawebsolutions/portfolio
Description: Responsive & Flexible Post Slider for WordPress. Unlimited slider anywhere via short-codes and easy admin setting.
Author: VinaWebSolutions
Version: 1.0
Author URI: http://themeforest.net/user/vinawebsolutions/portfolio
*/

/* If this file is called directly, abort. */
if(!defined('WPINC')) {
	die;
}

/* Defined Global Variants */
define('vgps_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');
define('vgps_plugin_dir', plugin_dir_path(__FILE__));
define('vgps_is_admin', is_admin());

/* Require Once Library */
require_once(plugin_dir_path(__FILE__) . 'includes/vgps-meta.php');
require_once(plugin_dir_path(__FILE__) . 'includes/vgps-functions.php');

/* Load Init Scripts */
function vgps_init_scripts()
{
	// load js, css for fontend
	if(!vgps_is_admin)
	{
		wp_enqueue_script('jquery');
		wp_enqueue_style('vg.postslider',  vgps_plugin_url. 'includes/css/postslider.css');
		wp_enqueue_script('vg.postslider', plugins_url('/includes/js/jquery.postslider.js' , __FILE__) , array('jquery'));	
	}
	
	// load css, js for backend
	if(vgps_is_admin)
	{
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_style('vnadmin', vgps_plugin_url . 'vnadmin/css/vnadmin.css');
		wp_enqueue_script('vgps_color_picker', 	plugins_url('/includes/js/color-picker.js', __FILE__), array('wp-color-picker'), false, true);		
		wp_enqueue_script('vnadmin', plugins_url('vnadmin/js/vnadmin.js' , __FILE__) , array('jquery'));
	}
}
add_action("init", "vgps_init_scripts");


/* Add Action Upload Function and Filter for Shortcode */
add_action('admin_enqueue_scripts', 'wp_enqueue_media');
add_filter('widget_text', 'do_shortcode');

/* Register Activation */
function vgps_activation()
{
	$vgps_version= "1.0";
	update_option('vgps_version', $vgps_version);
	
	$vgps_customer_type= "commercial";
	update_option('vgps_customer_type', $vgps_customer_type);

}
register_activation_hook(__FILE__, 'vgps_activation');


/* Display Slider */
function vgps_display($atts, $content = null) 
{
	$atts 			= shortcode_atts(array('id' => ""), $atts);
	$post_id 		= $atts['id'];
	$vgps_theme 	= get_post_meta($post_id, 'vgps_theme', true);
	$vgps_theme 	= vgps_get_theme_path($vgps_theme);
	$vgps_display 	= "";
	
	require_once($vgps_theme["dir"] . "/index.php");
	wp_enqueue_style('vgps-style-slider', $vgps_theme["url"] . '/style.css');
	$vgps_display .= call_user_func($vgps_theme["func"], $post_id);
	
	return $vgps_display;
}
add_shortcode('vgps', 'vgps_display');


/* Register Admin Menu */
function vgps_menu_settings(){
	include(plugin_dir_path(__FILE__) . 'vgps-settings.php');	
}

function vgps_menu_init() {
	add_submenu_page('edit.php?post_type=vgps', __('About VGPS', 'menu-wpt'), __('About VGPS', 'menu-wpt'), 'manage_options', 'vgps_menu_settings', 'vgps_menu_settings');	
}
add_action('admin_menu', 'vgps_menu_init');