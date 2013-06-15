<?php

// This file is part of the Carrington Blueprint Theme for WordPress
//
// Copyright (c) 2008-2012 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

define('CFCT_PATH', trailingslashit(TEMPLATEPATH));

/**
 * Set this to "true" to turn on debugging mode.
 * Helps with development by showing the paths of the files loaded by Carrington.
 */
define('CFCT_DEBUG', false);

/**
 * Theme version.
 */
define('CFCT_THEME_VERSION', '0.1');

/**
 * Theme URL version.
 * Added to query var at the end of assets to force browser cache to reload after upgrade.
 */
if (!(defined('CFCT_URL_VERSION'))) {
	define('CFCT_URL_VERSION', '0.1');
}

/**
 * Includes
 */
include_once(CFCT_PATH.'carrington-core/carrington.php');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (! isset($content_width)) {
	$content_width = 600;
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as
 * indicating support post thumbnails.
 */
if (! function_exists('cfct_theme_setup')) {
	function cfct_theme_setup() {
		/**
		 * Make theme available for translation
		 * Use find and replace to change 'carrington-blueprint' to the name of your theme.
		 */
		load_theme_textdomain('carrington-blueprint');

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * Enable post thumbnails support.
		 */
		add_theme_support('post-thumbnails');

		/**
		 * New image sizes that are not overwrote in the admin.
		 */
		// add_image_size('thumb-img', 160, 120, true);
		// add_image_size('medium-img', 510, 510, false);
		// add_image_size('large-img', 710, 700, false);

		/**
		 * Add navigation menus
		 */
		register_nav_menus(array(
			'main' => 'Main Navigation',
			'footer' => 'Footer Navigation'
		));

		/**
		 * Add post formats
		 */
		$custom_header_args = array(
			'width'         => 966,
			'height'        => 340,
			'default-image' => get_stylesheet_directory_uri() . '/assets/img/banner1.gif',
			'uploads'       => true,
		);
		add_theme_support( 'custom-header' , $custom_header_args );


		/**
		 * Add post formats
		 */
		// add_theme_support( 'post-formats', array('image', 'link', 'gallery', 'quote', 'status', 'video'));
	}
}
add_action('after_setup_theme', 'cfct_theme_setup');


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function cfct_widgets_init() {
	// Sidebar Defaults
	$sidebar_defaults = array(
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>'
	);
	// Copy the following code and replace values to create more widget areas
	register_sidebar(array_merge($sidebar_defaults, array(
		'id' => 'sidebar-default',
		'name' => __('Default Sidebar', 'carrington-blueprint'),
	)));

	register_sidebar(array_merge($sidebar_defaults, array(
		'id' => 'sidebar-twitter',
		'name' => __('Twitter Sidebar', 'carrington-blueprint'),
	)));

	register_sidebar(array_merge($sidebar_defaults, array(
		'id' => 'sidebar-tumblr',
		'name' => __('Tumblr Sidebar', 'carrington-blueprint'),
	)));


}
add_action( 'widgets_init', 'cfct_widgets_init' );

/**
 * Enqueue's scripts and styles
 */
function cfct_load_assets() {
	//Variable for assets url
	$cfct_assets_url = get_template_directory_uri() . '/assets/';

	// Styles
	wp_enqueue_style('styles', $cfct_assets_url . 'css/style.css', array(), CFCT_URL_VERSION);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Scripts
	wp_enqueue_script('modernizr', $cfct_assets_url . 'js/modernizr-2.5.3.min.js', array(), CFCT_URL_VERSION);
	wp_enqueue_script('placeholder', $cfct_assets_url . 'js/jquery.placeholder.min.js', array('jquery'), CFCT_URL_VERSION);
	wp_enqueue_script('script', $cfct_assets_url . 'js/script.js', array('jquery', 'placeholder'), CFCT_URL_VERSION);
	wp_enqueue_script('iphone-scaling-fix', $cfct_assets_url . 'js/ios-orientationchange-fix.js', array(), CFCT_URL_VERSION, true);
}
add_action('wp_enqueue_scripts', 'cfct_load_assets');

/* File:        linkify.php
 * Version:     20101010_1000
 * Copyright:   (c) 2010 Jeff Roberson - http://jmrware.com
 * MIT License: http://www.opensource.org/licenses/mit-license.php
 *
 * Summary: This script linkifys http URLs on a page.
 *
 * Usage:   See example page: linkify.html
 */
function linkify($text) {
    $url_pattern = '/# Rev:20100913_0900 github.com\/jmrware\/LinkifyURL
    # Match http & ftp URL that is not already linkified.
      # Alternative 1: URL delimited by (parentheses).
      (\()                     # $1  "(" start delimiter.
      ((?:ht|f)tps?:\/\/[a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]+)  # $2: URL.
      (\))                     # $3: ")" end delimiter.
    | # Alternative 2: URL delimited by [square brackets].
      (\[)                     # $4: "[" start delimiter.
      ((?:ht|f)tps?:\/\/[a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]+)  # $5: URL.
      (\])                     # $6: "]" end delimiter.
    | # Alternative 3: URL delimited by {curly braces}.
      (\{)                     # $7: "{" start delimiter.
      ((?:ht|f)tps?:\/\/[a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]+)  # $8: URL.
      (\})                     # $9: "}" end delimiter.
    | # Alternative 4: URL delimited by <angle brackets>.
      (<|&(?:lt|\#60|\#x3c);)  # $10: "<" start delimiter (or HTML entity).
      ((?:ht|f)tps?:\/\/[a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]+)  # $11: URL.
      (>|&(?:gt|\#62|\#x3e);)  # $12: ">" end delimiter (or HTML entity).
    | # Alternative 5: URL not delimited by (), [], {} or <>.
      (                        # $13: Prefix proving URL not already linked.
        (?: ^                  # Can be a beginning of line or string, or
        | [^=\s\'"\]]          # a non-"=", non-quote, non-"]", followed by
        ) \s*[\'"]?            # optional whitespace and optional quote;
      | [^=\s]\s+              # or... a non-equals sign followed by whitespace.
      )                        # End $13. Non-prelinkified-proof prefix.
      ( \b                     # $14: Other non-delimited URL.
        (?:ht|f)tps?:\/\/      # Required literal http, https, ftp or ftps prefix.
        [a-z0-9\-._~!$\'()*+,;=:\/?#[\]@%]+ # All URI chars except "&" (normal*).
        (?:                    # Either on a "&" or at the end of URI.
          (?!                  # Allow a "&" char only if not start of an...
            &(?:gt|\#0*62|\#x0*3e);                  # HTML ">" entity, or
          | &(?:amp|apos|quot|\#0*3[49]|\#x0*2[27]); # a [&\'"] entity if
            [.!&\',:?;]?        # followed by optional punctuation then
            (?:[^a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]|$)  # a non-URI char or EOS.
          ) &                  # If neg-assertion true, match "&" (special).
          [a-z0-9\-._~!$\'()*+,;=:\/?#[\]@%]* # More non-& URI chars (normal*).
        )*                     # Unroll-the-loop (special normal*)*.
        [a-z0-9\-_~$()*+=\/#[\]@%]  # Last char can\'t be [.!&\',;:?]
      )                        # End $14. Other non-delimited URL.
    /imx';
    $url_replace = '$1$4$7$10$13<a href="$2$5$8$11$14">$2$5$8$11$14</a>$3$6$9$12';
    return preg_replace($url_pattern, $url_replace, $text);
}
function linkify_html($text) {
    $text = preg_replace('/&apos;/', '&#39;', $text); // IE does not handle &apos; entity!
    $section_html_pattern = '%# Rev:20100913_0900 github.com/jmrware/LinkifyURL
    # Section text into HTML <A> tags  and everything else.
      (                              # $1: Everything not HTML <A> tag.
        [^<]+(?:(?!<a\b)<[^<]*)*     # non A tag stuff starting with non-"<".
      |      (?:(?!<a\b)<[^<]*)+     # non A tag stuff starting with "<".
      )                              # End $1.
    | (                              # $2: HTML <A...>...</A> tag.
        <a\b[^>]*>                   # <A...> opening tag.
        [^<]*(?:(?!</a\b)<[^<]*)*    # A tag contents.
        </a\s*>                      # </A> closing tag.
      )                              # End $2:
    %ix';
    return preg_replace_callback($section_html_pattern, '_linkify_html_callback', $text);
}
function _linkify_html_callback($matches) {
    if (isset($matches[2])) return $matches[2];
    return linkify($matches[1]);
}
