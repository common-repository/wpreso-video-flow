<?php
/*********************************
  Styles and Javascript files for WPreso Video Flow
*********************************/

add_action('wp_print_styles', 'add_jf_style');

function add_jf_style() {
	$baseUrl = WP_PLUGIN_URL . "/wpreso-video-flow/etc/css/";
	$baseDir = WP_PLUGIN_DIR . '/wpreso-video-flow/etc/css/';
	if ($handle = opendir($baseDir)) {
		while (false !== ($file = readdir($handle))) {
			if(end(explode(".",$file))=='css') {
				wp_register_style(current(explode(".",$file)), $baseUrl.$file);
				wp_enqueue_style( current(explode(".",$file)));
			}
		}
	}
}

// load jquery
wp_enqueue_script('jquery');

// load jCarousel Lite script
wp_enqueue_script('imageFlow', WP_PLUGIN_URL . "/wpreso-video-flow/etc/js/imageflow.js", array(), "1.2.1");

?>