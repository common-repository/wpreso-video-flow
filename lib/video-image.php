<?php
/*********************************
  Video Image functions for WPreso Video FeatureBox
*********************************/

function wpreso_getvideothumb($videourl) {
	$vrss = file_get_contents($videourl);
	
	if(!empty($vrss))
	{
		preg_match('/<media:thumbnail url="([^"]+)/',$vrss,$thumbnail_array);
		$thumbnail = $thumbnail_array[1];
		//Remove amp;
		$thumbnail = str_replace('amp;','',$thumbnail);
	} else {
		$thumbnail = "is empty";
	}
	
	return $thumbnail;
}

function wpreso_getmyspacethumb($videourl) {
	$vrss = file_get_contents($videourl);
	
	if(!empty($vrss))
	{
		preg_match('/<media:still url="([^"]+)/',$vrss,$thumbnail_array);
		$thumbnail = $thumbnail_array[1];
		//Remove amp;
		$thumbnail = str_replace('amp;','',$thumbnail);
	} else {
		$thumbnail = "is empty";
	}
	
	return $thumbnail;
}

function wpreso_getvimeothumb($videoid) {
	$url = 'http://vimeo.com/api/clip/'.$videoid.'/php';
	$contents = @file_get_contents($url);
	$array = @unserialize(trim($contents));
	return $array[0]['thumbnail_large'];
}

function wpreso_get_the_video_image($content,$format="path") {
	global $wpreso_cache;
	$wpreso_cache_url = get_option ('siteurl'). '/wp-content/wpreso-video-cache/';
	$wpreso_cache_dir = ABSPATH. 'wp-content/wpreso-video-cache/';
	// getting youtube video thumbnail
	if(preg_match( '#http://(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com/(watch\?v=|w/\?v=|\?v=)([\w-]+)(.*?)#i', $content, $matches )) {
		$vu = 'http://img.youtube.com/vi/' . $matches[3] . '/0.jpg';
		if(!file_exists($wpreso_cache_dir.md5($vu))) {
			$vt = wpreso_request_cache($vu, $vu);
		} else {
			$vt = $wpreso_cache_url.md5($vu);
		}
	// getting google video thumbnail
	} elseif(preg_match( '#http://video\.google\.([A-Za-z.]{2,5})/videoplay\?docid=([\d-]+)(.*?)#i', $content, $matches )) {
		$m = $matches[2];
		$vu = "http://video.google.com/videofeed?docid=".$m;
		if(!file_exists($wpreso_cache_dir.md5($vu))) {
			$vt = wpreso_request_cache(getvideothumb($vu), $vu);
		} else {
			$vt = $wpreso_cache_url.md5($vu);
		}
	// getting blip.tv thumbnail
	} elseif(preg_match( '#(\[blip.tv) (\?posts_id=)([\d]+)(.*?)#i', $content, $matches )) {
		$vu = "http://blip.tv/rss/flash/".$matches[3];
		if(!file_exists($wpreso_cache_dir.md5($vu))) {
			$vt = wpreso_request_cache(getvideothumb($vu), $vu);
		} else {
			$vt = $wpreso_cache_url.md5($vu);
		}
	// getting vimeo thumbnail
	} elseif(preg_match( '#http://(www.)?vimeo.com/([\d]+)(.*?)#i', $content, $matches )) {
		$vu = $matches[2];
		if(!file_exists($wpreso_cache_dir.md5($vu))) {
			$vt = wpreso_request_cache(wpreso_getvimeothumb($vu), $vu);
		} else {
			$vt = $wpreso_cache_url.md5($vu);
		}
	// getting dailymotion thumbnail
	} elseif(preg_match( '#http://www.dailymotion.com/video/([\w]+)(.*?)#i', $content, $matches)) {
		$vu = "http://www.dailymotion.com/thumbnail/320x240/video/".$matches[1];
		if(!file_exists($wpreso_cache_dir.md5($vu))) {
			$vt = wpreso_request_cache($vu, $vu);
		} else {
			$vt = $wpreso_cache_url.md5($vu);
		}
	// getting the metacafe thumbnail
	} elseif(preg_match( '#http://www.metacafe.com/watch/([\d]+)/([\w]+)/(.*?)#i', $content, $matches)) {
		$vu = "http://www.metacafe.com/api/item/".$matches[1];
		if(!file_exists($wpreso_cache_dir.md5($vu))) {
			$vt = wpreso_request_cache(getvideothumb($vu), $vu);
		} else {
			$vt = $wpreso_cache_url.md5($vu);
		}
	// getting viddler thumbnail
	} elseif(preg_match( '#(\[viddler) (id=)([\w]+)(.*?)#i', $content, $matches )) {
		$vu = "http://cdn-thumbs.viddler.com/thumbnail_2_".$matches[3].".jpg";
		if(!file_exists($wpreso_cache_dir.md5($vu))) {
			$vt = wpreso_request_cache($vu, $vu);
		} else {
			$vt = $wpreso_cache_url.md5($vu);
		}
	// getting myspace video thumbnail
	} elseif(preg_match( '#http://vids.myspace.com/index.cfm\?fuseaction=vids.individual&amp;videoid=([\d]+)#i', $content, $matches)) {
		$vu = "http://mediaservices.myspace.com/services/rss.ashx?type=video&videoID=".$matches[1];
		if(!file_exists($wpreso_cache_dir.md5($vu))) {
			$vt = wpreso_request_cache(wpreso_getmyspacethumb($vu), $vu);
		} else {
			$vt = $wpreso_cache_url.md5($vu);
		}
	}
	// check for cached image
	if($format=='img') {
		$vt = '<img src="'.$vt.'" alt="" />';
	}
	return $vt;
}
?>