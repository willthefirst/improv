<?php

/*
Template Name: Home Page
*/

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

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

<?php
get_footer();
?>