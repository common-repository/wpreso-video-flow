<?php
/*********************************
  Shortcodes for WPreso Video Flow
*********************************/

function wpreso_videoflow_shortcode($atts, $content = null) {
	global $wp_query;
	$options = get_option('wpreso_video_flow');
	extract(shortcode_atts(array(  
		"cat" => $options['cat'],
		"num" => $options['num'],
		"off" => $options['off'],
		"ran" => $options['ran'],
		"rfl" => $options['rfl'],
		"sld" => $options['sld'],
		"cap" => $options['cap'],
		"exi" => $options['exi']
	), $atts));
	$wpvfid = md5(uniqid(mt_rand(), true));
	$orderby = (($ran=='true')? 'rand' : 'date' );
	$wpvfposts = get_posts('numberposts='.$num.'&order=DESC&orderby='.$orderby.'&category='.$cat.'&exclude='.$exi.'&offset='.$off);
	$str .= "\n\n".'<!-- WPreso Video Flow starts here -->'."\n\n";
	$str .= '<div id="wpvf_'.$wpvfid.'" class="imageflow">'."\n";
	foreach($wpvfposts as $post) {
		setup_postdata($post);
		$vi = wpreso_get_the_video_image(get_the_content());
		if(!empty($vi)) {
			if($rfl=='true') {
				$str .= '<img src="../../../../../'. end(explode("/",$vi,-2)) .'/wpreso-video-cache/'.end(explode("/",$vi)).'" longdesc="'. get_permalink($post->ID) .'" alt="'. get_the_title($post->ID) .'" width="413" height="212">'."\n";
			} else {
				$str .= '<img src="'.$vi.'" longdesc="'. get_permalink($post->ID) .'" alt="'. get_the_title($post->ID) .'" width="413" height="212">'."\n";
			}
		}
	}
	$str .= '</div>'."\n";
	if($rfl=='true') {
	$str .= '
	<script type="text/javascript">
	domReady(function()
	{
		var flowels = jQuery("#wpvf_'.$wpvfid.' img").length;
		var startpoint = Math.round(flowels/2);
		var instanceOne = new ImageFlow();
		instanceOne.init({ 
			ImageFlowID:"wpvf_'.$wpvfid.'",
			reflectionPNG: '.$rfl.',
			reflectionP: 0.4,
			slider: '.$sld.',
			buttons: '.$sld.',
			captions: '.$cap.',
			xStep: 300,
			imagesHeight: 0.6,
			imageFocusM: 1.5,
			startID: startpoint
		});
	});
	</script>
	';
	} else {
	$str .= '
	<script type="text/javascript">
	domReady(function()
	{
		var flowels = jQuery("#wpvf_'.$wpvfid.' img").length;
		var startpoint = Math.round(flowels/2);
		var instanceOne = new ImageFlow();
		instanceOne.init({ 
			ImageFlowID:"wpvf_'.$wpvfid.'",
			reflections: false, 
            reflectionP: 0.0,
			slider: '.$sld.',
			buttons: '.$sld.',
			captions: '.$cap.',
			xStep: 300,
			imagesHeight: 0.6,
			imageFocusM: 1.5,
			startID: startpoint
		});
	});
	</script>
	';
	}
	$str .= "\n\n".'<!-- WPreso Video Flow ends here -->'."\n\n";
	return $str;
}

add_shortcode('wpvf', 'wpreso_videoflow_shortcode'); 

?>