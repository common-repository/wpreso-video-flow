<?php
/*********************************
  Cache functions for WPreso Video FeatureBox
*********************************/

// Simple cache function
function wpreso_request_cache($url, $furl, $timeout=86400) {
	$wpreso_cache_url = get_option ('siteurl'). '/wp-content/wpreso-video-cache/';
	$wpreso_cache_dir = ABSPATH. 'wp-content/wpreso-video-cache/';
	check_cache_dir($wpreso_cache_dir);
	$size = getimagesize($url);
	$mime = $size['mime'];
	$ext = get_extension_from_mime($size['mime']);
	if(valid_mime($mime)) {
		$dest_file = $wpreso_cache_dir . md5($furl);# . '.' . $ext;
		$dest_url = $wpreso_cache_url . md5($furl);# . '.' . $ext;
		if(!file_exists($dest_file) || filemtime($dest_file) < ($_SERVER['REQUEST_TIME']-$timeout)) {
			create_cache_image($url, $dest_file,$mime);
		}
		return $dest_url;
	} else {
		return $url;
	}
}

function check_cache_dir($cache_dir) {
	if(!file_exists($cache_dir)) {
		// give 777 permissions so that developer can overwrite
		// files created by web server user
		mkdir($cache_dir);
		chmod($cache_dir, 0777);
	}	
}

function valid_extension ($ext) {
	if( preg_match( "/jpg|jpeg|png|gif/i", $ext ) ) return true;
	return false;
}

function valid_mime ($mime) {
	$vmime = array("image/gif","image/jpeg","image/png");
	if( in_array($mime,$vmime)) return true;
	return false;
}

function get_extension_from_mime($mime) {
	$ext = array("image/gif"=>"gif","image/jpeg"=>"jpg","image/png"=>"png");
	return $ext[$mime];
}

function create_cache_image($url,$dest_file,$mime) {
	$img = NULL;
	if ($mime == 'image/jpeg') {
		$img = @imagecreatefromjpeg($url);
		$im = imagejpeg($img, $dest_file);
		imagedestroy($img);
	} else if ($mime == 'image/png') {
		$img = @imagecreatefrompng($url);
		$im = imagepng($img, $dest_file);
		imagedestroy($img);
	# Only if your version of GD includes GIF support
	} else if ($mime == 'image/gif') {
		$img = @imagecreatefromgif($url);
		$im = imagegif($img, $dest_file);
		imagedestroy($img);
	}
	return $im;
}

?>