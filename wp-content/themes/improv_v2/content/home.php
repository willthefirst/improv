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
if (CFCT_DEBUG) { cfct_banner(__FILE__); }
?>

<a class="banner c4-1234">
	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</a>

<div class="row feeds">
	<section class="c6-12">
		<h2>Our Tweets</h2>
		<?php echo do_shortcode('[twitter-feed username="DnvrImprovFest" id="12345" mode="feed"]'); ?>
	</section>
	<section class="c6-34">
		<h2>Our Blog</h2></section>
	<section class="c6-56">
		<h2>Our Videos</h2></section>
</div>
<div class="row sponsors">
	<h2>Our Sponsors</h1>
</div>


<article id="post-<?php the_ID() ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>') ?>
	</div>
	<div class="entry-content">
		<?php
			the_content('<span class="more-link">'.__('Continued&hellip;', 'carrington-blueprint').'</span>');
			$args = array(
				'before' => '<p class="pages-link">'. __('Pages: ', 'carrington-blueprint'),
				'after' => "</p>\n",
				'next_or_number' => 'number'
			);
			wp_link_pages($args);
		?>
	</div><!--.entry-content-->
</article>