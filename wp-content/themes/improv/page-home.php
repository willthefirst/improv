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
		<h2>We're on Twitter.</h2>
		<?php get_sidebar('twitter'); ?>
	</section>
	<section class="c6-34">
		<h2>and Facebook.</h2>
		<?php fb_feed(); ?>
	</section>
	<section class="c6-56">
		<h2>and Tumblr too.</h2>
		<?php get_sidebar('tumblr'); ?>
	</section>
</div>
<div class="row sponsors">
	<h2>Our Sponsors</h2>
	<?php echo sponsors_carousel(); ?>
</div>

<?php
get_footer();
?>