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

	$custom_render_function = function($evnt){
	    $time = strtotime($evnt->start_date);
	    if( isset($evnt->venue) && isset( $evnt->venue->name )){
	        $venue_name = $evnt->venue->name;
	    }else{
	        $venue_name = 'online';
	    }
	    $event_html = "<a href='". $evnt->url. " class='eb_event_list_item' id='evnt_div_" . $evnt->id ."'>
	    					<span class='eb_event_list_title'>".$evnt->title."</span>
	    					<span class='eb_event_list_date'>". strftime('%a, %B %e', $time) . "</span>
	    					<span class='eb_event_list_time'>". strftime('%l:%M %p', $time) . "</span>
	    					<span class='eb_event_list_location'>". $venue_name . "</span>
	    					<div class='eb_event_list_description'>
	    						<img class='eb_event_list_logo' src=".$evnt->logo." />"
	    						. $evnt->description .
	    					"</div>
	    			   </a>\n";
	    return $event_html;
	};

	$event_list_html = Eventbrite::eventList( $events, $custom_render_function	);

	echo $event_list_html;




	?>
</div><!-- #primary -->

<?php
get_footer();
?>