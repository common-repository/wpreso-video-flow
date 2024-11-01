<?php
/*********************************
  Options page for WPreso Video Flow
*********************************/

add_action('admin_init', 'wpreso_vf_options_init' );
add_action('admin_menu', 'wpreso_vf_options_add_page');

// Init plugin options to white list our options
function wpreso_vf_options_init(){
	register_setting( 'wpreso_vf_options_options', 'wpreso_video_flow', 'wpreso_vf_options_validate' );
	$wpvf_default_values = array("cat"=>"","num"=>20,"off"=>"","ran"=>"false","rfl"=>"true","sld"=>"false","cap"=>"true","exi"=>"");
	add_option('wpreso_video_flow', $wpvf_default_values, '', 'yes');
}

// Add menu page
function wpreso_vf_options_add_page() {
	add_options_page(__("WPreso Video Flow Options", 'wpreso-video-flow'), __("WPreso Video Flow", 'wpreso-video-flow'), 'manage_options', 'wpreso_vf_options', 'wpreso_vf_options_do_page');
	#add_menu_page(__("WPreso Video Flow Options", 'wpreso-video-flow'), __("WPreso Video Flow", 'wpreso-video-flow'), 8, __FILE__, 'wpreso_vf_options_do_page','');
	#add_submenu_page('options-general.php','Test Sublevel', 'Test Sublevel', 8, 'sub-page', 'mt_sublevel_page');
}

// Draw the menu page itself
function wpreso_vf_options_do_page() {
	?>
	<div class="wrap">
		<h2><?php _e("WPreso Video Flow Settings", 'wpreso-video-flow');?></h2>
        <form method="post" action="options.php">
			<?php settings_fields('wpreso_vf_options_options'); ?>
			<?php $wpreso_vf_options = get_option('wpreso_video_flow'); ?>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="wpvfcat"><?php _e("Default category(ies) by comma separated ids", 'wpreso-video-flow');?></label></th>
					<td><input type="text" name="wpreso_video_flow[cat]" id="wpvfcat" value="<?php echo $wpreso_vf_options['cat']; ?>" /> (<?php _e("Add a minus sign (-) in front of the id to exclude the category - No spaces", 'wpreso-video-flow');?>)</td>
				</tr>
				<tr valign="top"><th scope="row"><label for="wpvfnum"><?php _e("Default number of posts", 'wpreso-video-flow');?></label></th>
					<td><input type="text" size="2" name="wpreso_video_flow[num]" id="wpvfnum" value="<?php echo $wpreso_vf_options['num']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="wpvfoff"><?php _e("Default post offset", 'wpreso-video-flow');?></label></th>
					<td><input type="text" size="2" name="wpreso_video_flow[off]" id="wpvfoff" value="<?php echo $wpreso_vf_options['off']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="wpvfran"><?php _e("Enable random posts",'wpreso-video-flow');?></label></th>
					<td><input type="checkbox" name="wpreso_video_flow[ran]" id="wpvfran" value="true" <?php checked('true', $wpreso_vf_options['ran']); ?> /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="wpvfrfl"><?php _e("Enable reflection on images", 'wpreso-video-flow');?></label></th>
					<td><input type="checkbox" name="wpreso_video_flow[rfl]" id="wpvfrfl" value="true" <?php checked('true', $wpreso_vf_options['rfl']); ?> /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="wpvfsld"><?php _e("Enable slider and buttons", 'wpreso-video-flow');?></label></th>
					<td><input type="checkbox" name="wpreso_video_flow[sld]" id="wpvfsld" value="true" <?php checked('true', $wpreso_vf_options['sld']); ?> /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="wpvfcap"><?php _e("Enable caption for images", 'wpreso-video-flow');?></label></th>
					<td><input type="checkbox" name="wpreso_video_flow[cap]" id="wpvfcap" value="true" <?php checked('true', $wpreso_vf_options['cap']); ?> /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="wpvfexi"><?php _e("Explude posts from VideoFlow by comma separated ids", 'wpreso-video-flow');?></label></th>
					<td><input type="text" name="wpreso_video_flow[exi]" id="wpvfexi" value="<?php echo $wpreso_vf_options['exi']; ?>" /> (<?php _e("No spaces", 'wpreso-video-flow');?>)</td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
		<div style="margin:10px 0; border-bottom:0px solid #ccc; border-top:1px solid #ccc; padding:5px 10px;">
        	<h2><?php _e("Help", 'wpreso-video-flow');?></h2>
            <p>
        		<?php _e("You can override the default functions in the shortcode like this", 'wpreso-video-flow');?>:<br/>
                <code>[wpvf cat="-1,2,3" num="20" off="5" ran="true" rfl="true" sld="true" cap="false" exi="12,47,53",]</code>
            </p>
            <p>
            	<?php _e("You can override the default functions in the template function like this", 'wpreso-video-flow');?>:<br/>
                <code>&lt;?php echo wpreso_videoflow($cat="-1,2,3", $num="20", $off="5", $ran="true", $rfl="true", $sld="true", $cap="false", $exi="12,47,53",); ?>
                </code>
            </p>
            <p>
            	<?php _e("For more help on setting up WPreso Video Flow, please visit", 'wpreso-video-flow');?> <a href="http://www.wpreso.com/plugins/wpreso-video-flow"><?php _e("WPreso Video Flow", 'wpreso-video-flow');?></a>
            </p>
        </div>
		<div style="margin:10px 0; border-bottom:0px solid #ccc; border-top:1px solid #ccc; padding:5px 10px;">
        	<h2><?php _e("Credits", 'wpreso-video-flow');?></h2>
            <ul>
                <li><a href="http://www.wordpress.org">WordPress</a> <?php _e("for their software, which is awesome", 'wpreso-video-flow');?>.</li>
            	<li><a href="http://www.viper007bond.com/wordpress-plugins/vipers-video-quicktags/">Viper's Video Quicktags</a> <?php _e("for a superb and easy to use video plugin", 'wpreso-video-flow');?>.</li>
                <li><a href="http://imageflow.finnrudolph.de/">ImageFlow</a> <?php _e("for a sweet javascript cover flow script", 'wpreso-video-flow');?>. <strong><?php _e("Commercial sites need a license to use the script",'wpreso-video-flow');?>.</strong></li>
                <li><a href="http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/?cp=all">Ozh</a> <?php _e("for a great tutorial on option pages", 'wpreso-video-flow');?>.</li>
                <li><a href="http://www.smashingmagazine.com/2009/02/02/mastering-wordpress-shortcodes/">Smashing Magazine</a> <?php _e("for a smashing tutorial on shortcodes", 'wpreso-video-flow');?>.</li>
                <li><a href="http://www.youtube.com">Youtube</a>, <a href="http://video.google.com/">Google Video</a>, <a href="http://www.blip.tv/">Blip.tv</a>, <a href="http://www.vimeo.com/">Vimeo</a>, <a href="http://www.dailymotion.com/">Dailymotion</a>, <a href="http://www.metacafe.com/">Metacafe</a>, <a href="http://www.viddler.com/">Viddler</a> and <a href="http://vids.myspace.com">Myspace</a> <?php _e("for making it simple to extract video image information", 'wpreso-video-flow');?>.</li>
            </ul>
        </div>
	</div>
	<?php	
}

// Sanitize and validate input. Accepts an array, return a sanitized array.
function wpreso_vf_options_validate($input) {
	$input['cat'] =  ( preg_match('/^(-)?\d+(,(-)?\d+)*$/', trim($input['cat'])) ? trim($input['cat']) : '');
	$input['num'] =  ( intval($input['num']) == 0 ? '' : intval($input['num']) );
	$input['off'] =  ( intval($input['off']) == 0 ? '' : intval($input['off']) );
	$input['ran'] =  ( $input['ran'] == 'true' ? 'true' : 'false' );
	$input['rfl'] =  ( $input['rfl'] == 'true' ? 'true' : 'false' );
	$input['sld'] =  ( $input['sld'] == 'true' ? 'true' : 'false' );
	$input['cap'] =  ( $input['cap'] == 'true' ? 'true' : 'false' );
	$input['exi'] =  ( preg_match('/^\d+(,\d+)*$/', trim($input['exi'])) ? trim($input['exi']) : '');
	
	return $input;
}


?>