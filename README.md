# VideoPlace
Contributors: Jacob Martella
Tags: black, dark, two-columns, right-sidebar, responsive-layout, fluid-layout, custom-background, custom-header, editor-style, featured-images, sticky-posts, theme-options, translation-ready, threaded-comments
Requires at least: 4.8
Tested up to: 6.1.1
Requires PHP: 7.0
Stable tag: 2.1
License: GNU General Public License v3.0 (or later)
License URI: https://www.gnu.org/licenses/gpl-3.0.html

## Description
YouTube is a great place to upload your videos, but a not-so-great place if you want a customizable vlog. VideoPlace provides you with just that. This theme allows you the flexibility of being able to customize the look of your vlog, while keeping the look and feel of you videos similar to that of YouTube. Happy vlogging!

## Installation
### Via WordPress Admin
- From your sites admin, go to Themes > Install Themes.
- In the search box, type 'VideoPlace' and press enter.
- Locate the entry for 'VideoPlace' (there should be only one) and click the 'Install' link.
- When installation is finished, click the 'Activate' link.

### Manual Install
- Download the file from the theme page.
- In the WordPress Admin area, go to Appearance > Themes > Add Themes > Upload Themes.
- Upload the theme zip file that you've downloaded.
- Once the theme is uploaded, click the 'Activate' link.

## Features
### Pulled Out Videos
VideoPlace features great support for displaying your videos. Simply place the YouTube, Vimeo or other embedded video link into the post and VideoPlace puts it in all of the necessary places to give your videos the treatment they deserve.

### Custom Screenshots
Want to put up a custom photo over top of your video when the page loads? You can do that now in VideoPlace. Simply add a featured image to you post. Then the image will show up over top of the video. When the reader clicks on the photo, the video will appear and start playing.

### Menu
VideoPlace supports one main menu displayed under the header that you can customize.

### Custom Header
Put your mark on your website with a custom header. The maximum size for the header is 1000px by 250px but smaller headers will work with no issues.

### Custom Background
Go further with customizing the look of your website with a custom background. For maximum readability, a solid, dark-ish color works best.

### Related Videos
Your viewers will easily be able to go between posts with a related posts section below the comments, similar to that of YouTube. And the best part, you don't have to do anything to make it happen.

### Site Logo Support
Since WordPress 4.3, users have been able to add a site logo for their website. VideoPlace takes advantage of that by pulling that site logo, if you have one, and putting it in the footer. Go to Customize > Site Identity to upload your logo.

### Two Footer Widget Areas
Also in the footer are two widget areas, perfectly set up for a custom menu and other widgets that you may want use.

### Excerpt Support
VideoPlace extensively uses the excerpt feature of WordPress, which should act as a short description of the video. You can add an excerpt at the bottom of the post editor. If it's not there, go to 'Screen Options' and make sure 'Excerpt' is selected.

## How To's
### First Post
Setting up your first post might be a little bit interesting, compared to other themes. If you are confused, follow the steps below to maximize the post possibilities.
- Like any typical post, give the post a title and write the post in the post editor.
- Copy the video link and place it anywhere in the story (although putting at the top is the easiest).
- Give the post an excerpt. If you don't see the excerpt box below the post editor, go to 'Screen Options' and make sure 'Excerpt' is selected. Make sure it's around 150 to 200 characters.
- Put some tags on the post. This helps when finding related videos.
- If you want to show a photo over top of the video when the page loads, add a featured image to the post. The image will go away when the user clicks on it.
- Because the video shows up instead of a featured photo, you don't have to worry about adding one to the post.

### Set Up a Child Theme
When customizing a theme, the best practice is to create a child theme. This way, when you update the parent theme, all of your changes will still remain intact. Creating a child theme is very simple if you use the steps below.
- Using your preferred FTP client, navigate to the "themes" directory inside the "wp-content" directory and create a directory titled "videoplace-child".
- Once there, create a style.css file and add the following lines of code in there and save.
	/*
	Theme Name: VideoPlace Child
	Description: Child theme for VideoPlace theme
	Author: <Your Name>
	Template: videoplace
	*/
- Then create a functions.php file and add the following code and save.
	<?php function videoplace_child_theme_styles() {
		wp_enqueue_style( 'main_css', get_stylesheet_uri() );
	}
	add_action( 'wp_enqueue_scripts', 'videoplace_child_theme_styles', 10 ); ?>

 Support
If you have a question, need to report a bug to be fixed or have a feature request for a future version, email me at me@jacobmartella.com or fill out the form on the theme page (https://jacobmartella.com/wordpress/wordpress-themes/videoplace-wordpress-theme).

## Changelog
[View Changelog](CHANGELOG.md)

## Contributing
[Learn how to contribute](CONTRIBUTING.md)

## License
GNU General Public License
http://www.gnu.org/licenses/gpl.html

### Photo License
Except where otherwise noted, all photos in the screenshot are also licensed under the GNU General Public License. Copyright 2015 Jacob Martella

### Social Media Icons License
All of the social media icons are from https://dribbble.com/shots/1094936-Free-Flat-Social-Media-Icon-Set and licensed under the GNU General Public License (http://www.gnu.org/licenses/gpl.html).

### Scripts License
All of the scripts used in this theme are licensed under the GNU General Public License (http://www.gnu.org/licenses/gpl.html).

### Fonts License
PlayfairDisplay-Regular.ttf: Copyright (c) 2010-2012 by Claus Eggers Sørensen (es@forthehearts.net), with Reserved Font Name 'Playfair'
PlayfairDisplay-Italic.ttf: Copyright (c) 2010-2012 by Claus Eggers Sørensen (es@forthehearts.net), with Reserved Font Name 'Playfair'
PlayfairDisplay-Bold.ttf: Copyright (c) 2010-2012 by Claus Eggers Sørensen (es@forthehearts.net), with Reserved Font Name 'Playfair'
Roboto-Light.ttf: Copyright 2011 Google Inc. All Rights Reserved.
Roboto-LightItalic.ttf: Copyright 2011 Google Inc. All Rights Reserved.
Roboto-Regular.ttf: Copyright 2011 Google Inc. All Rights Reserved.
Roboto-Italic.ttf: Copyright 2011 Google Inc. All Rights Reserved.
Roboto-Bold.ttf: Copyright 2011 Google Inc. All Rights Reserved.
RobotoSlab-Light.ttf: Font data copyright Google 2013
RobotoSlab-Regular.ttf: Font data copyright Google 2013
RobotoSlab-Bold.ttf: Font data copyright Google 2013
Font Awesome: SIL OFL 1.1 (Font), MIT License (Code)
