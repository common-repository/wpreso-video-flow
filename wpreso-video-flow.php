<?php
/*
Plugin Name: 	WPreso Video Flow
Version: 		0.3
Plugin URI: 	http://www.wpreso.com/plugins/wpreso-video-flow/
Description: 	Add a video cover flow to your site. Extracts the video thumbs from videos in posts. Works with Youtube, Google Video, Blip.tv, Vimeo, Dailymotion, Metacafe, Viddler and Myspace.
Author: 		WPreso
Author URI: 	http://www.wpreso.com/
*/

/*
The MIT License

Copyright (c) 2009 WPreso.com license[at]wpreso.com

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

if (!defined ('WP_PLUGIN_URL')) {define ('WP_PLUGIN_URL', get_option ('siteurl'). '/wp-content/plugins/');}
if (!defined ('WP_PLUGIN_DIR')) {define ('WP_PLUGIN_DIR', ABSPATH. 'wp-content/plugins' );}

// Path constants
define('WPRESO_VF_PLUGINLIB', WP_PLUGIN_DIR . '/wpreso-video-flow/lib');

// Cache functions
if(!function_exists(wpreso_request_cache)) {
require_once(WPRESO_VF_PLUGINLIB . '/cache-functions.php');	
}

// Plugin options page functions
require_once(WPRESO_VF_PLUGINLIB . '/plugin-options.php');

// Video thumbnail functions
if(!function_exists(wpreso_get_the_video_image)) {
require_once(WPRESO_VF_PLUGINLIB . '/video-image.php');
}

// Plugin shortcode and filters functions
require_once(WPRESO_VF_PLUGINLIB . '/shortcodes-and-filters.php');

// Plugin script and style attachment functions
require_once(WPRESO_VF_PLUGINLIB . '/scripts-and-styles.php');

// Template/Theme functions
require_once(WPRESO_VF_PLUGINLIB . '/template-functions.php');

// Add settings link on plugin page
function wpreso_vf_settings_link($links) {
  $settings_link = '<a href="' . admin_url( 'options-general.php?page=wpreso_vf_options' ) . '">' . __('Settings', 'wpreso-video-flow') . '</a>';
  array_unshift($links, $settings_link);
  return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'wpreso_vf_settings_link' );

?>