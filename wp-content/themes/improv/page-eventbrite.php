<?php

/*
Template Name: Eventbrite Listings
*/

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="primary" class="c6-1234">
	<?php

	// For the loop used, look in /loops
	cfct_loop();

	$search_params = array(
	    'organizer' => 'Denver Improv Festival',
	    'sort_by' => 'date',
	);

	try {
	    $events = $eb_client->event_search( $search_params);
	} catch ( Exception $e ) {
	    // Be sure to plan for potential error cases
	    // so that your application can respond appropriately

	    //var_dump($e);
	    $events = array();
	}

	echo Eventbrite::eventList( $events, 'eventListRow');


	?>
</div><!-- #primary -->

<?php
get_footer();
?>