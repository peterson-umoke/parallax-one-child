<?php
/**
* Child Functions file for the ogolord theme
* @version 3.2.1
* @package ogolord-theme
* @author Peterson Nwachukwu Umoke
*/
// constant defininitions
if(!defined('CHILD_THEME')) define('CHILD_THEME',get_stylesheet_directory_uri());
if(!defined('PARENT_THEME')) define('PARENT_THEME', get_template_directory_uri());

// config arrays
/**
* $styles['name_of_style'] = "/path/to/file";
* $scripts['name_of_script'] = "/path/to/file";
*/

//load scripts and styles
if(!function_exists('load_child_scripts')) {
	function load_child_scripts() {

		$styles_config['flexslider'] = "https://cdn.jsdelivr.net/flexslider/2.6.3/flexslider.css";
		$styles_config['font-awesome'] = "https://cdn.jsdelivr.net/fontawesome/4.6.3/css/font-awesome.min.css";
		$styles_config['Child_theme']	= CHILD_THEME.'/style.css';
		
		$scripts_config['flexslider'] = "https://cdn.jsdelivr.net/flexslider/2.6.3/jquery.flexslider-min.js";
		$scripts_config['app']	= CHILD_THEME.'/js/app.js';

		if(isset($scripts_config)){
			foreach ($styles_config as $style_key => $style_value) {
				wp_register_style($style_key,$style_value);
				wp_enqueue_style($style_key);
			}
		}

		if(isset($scripts_config)){
			foreach ($scripts_config as $scripts_key => $scripts_value) {
				wp_register_script($scripts_key,$scripts_value,array(),"",true);
				wp_enqueue_script($scripts_key);
			}
		}

	}

	add_action("wp_enqueue_scripts","load_child_scripts");
} else {
	die("The function :<pre> function load_child_scripts() </pre> exists please check your current theme");
}

// require in other necessary files
require_once get_stylesheet_directory() . '/inc/theme-options.php';
require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_stylesheet_directory() . '/inc/install-plugins.php';