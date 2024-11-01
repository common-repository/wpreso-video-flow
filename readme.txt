=== WPreso Video Flow ===
Contributors: WPreso
Donate link: http://www.wpreso.com/about/advertise
Tags: video cover flow, video images, video thumbnails, video slider, featured content, imageFlow, youtube, google video, vimeo, blip.tv, viddler, metacafe, dailymotion, myspace
Requires at least: 2.8
Tested up to: 2.8.4
Stable tag: 0.3

WPreso Video Flow is a WordPress plugin that allows you to create a Videos Cover Flow from your video posts or video category.

== Description ==

WPreso Video Flow is a WordPress plugin that allows you to create a Videos Cover Flow from your video posts or video category.

It looks through the post, finds the video, gets the image for the video and displays this.

All images are cached and if one of the other video plugins from WPreso is used, the same image cache is used, to save space and speed up performance.

It was made as an addition to Viper's Video Quicktags.

Currently supports these video sites:

* [YouTube](http://www.youtube.com/)
* [Google Video](http://video.google.com/)
* [DailyMotion](http://www.dailymotion.com/)
* [Vimeo](http://www.vimeo.com/)
* [Viddler](http://www.viddler.com/)
* [Metacafe](http://www.metacafe.com/)
* [Blip.tv](http://blip.tv/)
* [MySpaceTV](http://vids.myspace.com/)

== Installation ==

###Updgrading From A Previous Version###

To upgrade from a previous version of this plugin, delete the entire folder and files from the previous version of the plugin and then follow the installation instructions below.

###Installing The Plugin###

Extract all files from the ZIP file, **making sure to keep the file structure intact**, and then upload it to `/wp-content/plugins/`. This should result in multiple subfolders and files.

Then just visit your admin area and activate the plugin.

**See Also:** ["Installing Plugins" article on the WP Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

**For more information:** please visit the [WPreso Video Flow documentation](http://www.wpreso.com/plugins/wpreso-video-flow/#documentation).

== Frequently Asked Questions ==

= The images show up, but the slider does not and or it does not work? =
Your theme lacks the `<?php wp_head(); ?>` hook. Please add it.

= Why are some video sites not supported? =
The plugin supports video sites in Viper's Video Quicktag plugin. Some where left out, like Flickr and Veoh, because of their requirements of an API key. These and others might be added in the future, but there is no guarantee.

= Does this plugin support other languages? =
Yes, it does. Included in the **localization** folder is the translation template you can use to translate the plugin. See the [WordPress Codex](http://codex.wordpress.org/Translating_WordPress) for details. When you're done translating it, please email me (trans[at]wpreso.com) the translation file so I can include it with the plugin.

= How do I add it to my Theme? =
You can add the `<?php echo wpreso_videoflow(); ?>` to your Theme. You can override the default settings set in the settings page. For more on this, please visit the [documentation](http://www.wpreso.com/plugins/wpreso-video-flow/#documentation).

= How do I add it in my posts/pages? =
You can add the shortcode [wpvf] to your posts/pages. You can override the default settings set in the settings page. For more on this, please visit the [documentation](http://www.wpreso.com/plugins/wpreso-video-flow/#documentation).

= Where do I get support for this plugin? =
Well I can't believe that there are any questions left unanswered, after this FAQ and the [documentation](http://www.wpreso.com/plugins/wpreso-video-flow/#documentation), but should this really be the case, I ask you to post on the [WordPress.org support forums](http://wordpress.org/tags/wpreso-video-flow), and I will do my best, and when I have time, to answer your question. Please remember that this plugin is free and therefore support might at times be sparse as I might be working on other projects.

= I like your plugin, can I make a donation? =
As such I do not accept donations, but you can sponsor the plugin development by buying a small 10 dollar ad on the site [WPreso](http://www.wpreso.com) by visiting the [advertise section](http://www.wpreso.com/about/advertise). Then we both get something out of this, I get some support and you get some exposure.

== Screenshots ==

1. WPreso Video Flow settings page
2. WPreso Video Flow example.
2. WPreso Video Flow example.

== Changelog ==

= v0.3 =

* **Fixed an error with a call to a function that belonged to WPreso Video FeatureBox.**

= v0.2 =

* **Removed dependency on deprecated function mime_content_type() for CSS inclusion.**

= v0.1 =

* **Initial release**
