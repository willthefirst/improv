<?php

/*
Template Name: Eventbrite Listings
*/

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

// Spin up Eventbrite API
// App key available at https://www.eventbrite.com/api/key
require 'api/eventbrite/Eventbrite.php';
$eb_client = new Eventbrite( array('app_key'=>'NXCBW2AT4KVH4JPYZK',
									'user_key'=>'130543362215202245325'));

get_header();

?>

	<h1>Tickets</h2>

	<?php

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
	    if(isset($evnt->logo)){
	    	$logo = "<img class='eb_event_list_logo' src=".$evnt->logo." />";
	    }
	    else {
	    	$logo = '';
	    }
	    $event_html = "<article class='eb_event_list_item' id='evnt_div_" . $evnt->id ."'><a href='". $evnt->url. "' class='wrapper-link'>
	    					<div class='event-meta'>
	    						<span class='eb_event_list_date'>". strftime('%a, %B %e', $time) . "</span><span class='eb_event_list_time'>". strftime('%l:%M %p', $time) . "</span><span class='eb_event_list_location'>@ ". $venue_name . "</span>
	    					</div>
	    					<div class='event-main'>
	    						<h3 class='eb_event_list_title'>".$evnt->title."</h3>
	    						<div class='eb_event_list_description'>"
	    							. $logo
	    							. $evnt->description .
	    						"</div>
	    					</div>
	    					<button class='buy-me'>
	    						Shut up and take my money.
	    					</button>
	    			   </a></article>\n";
	    return $event_html;
	};

	$event_list_html = Eventbrite::eventList( $events, $custom_render_function	);
	echo $event_list_html;

	?>

<?php
get_footer();
?>