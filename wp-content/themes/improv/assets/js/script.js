jQuery(function($) {

	// Requires jquery.placeholder.min.js
	// Add support for placeholder attribute in older browsers.
	$('.search-input').placeholder();

	$('.crowd-suggestion').submit(function(e) {
		e.preventDefault();

		$('.crowd-suggestion-result').hide();
		$('.processing').show();
		$('.crowd-suggestion-container').addClass("spin");

		var query = ($('.crowd-suggestion-value')[0].value);
		var image_url, style;

		$.getJSON('http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=' + query + '&callback=?', function(data) {
		  image_url = data.responseData.results[0].tbUrl;
		  style = 'url("' + image_url + '");';
		  $('body').css('background-image', 'url(' + image_url + ')');
		  $('.processing').hide();
		  $('.crowd-suggestion-container').removeClass("spin");
		  $('.crowd-suggestion-result').show();

		});
	});

});
