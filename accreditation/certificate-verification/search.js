/* JS File */

// Start Ready
$(document).ready(function() {
	$('input#search').focus();

	// Icon Click Focus
	$('div.icon').click(function(){
		$('input#search').focus();
	});

	// Live Search
	// On Search Submit and Get Results
	function search() {
		var query_value = $('input#search').val();
		$('b#search-string').html(query_value);
		if(query_value !== ''){
			var mySpreadsheet = 'https://docs.google.com/spreadsheets/d/1WQIHuf0SgnTU1QRG-qMxAJccmsGaPJ_FF7nVSdnT-m8/edit#gid=516585884';

			var myQuery = "select B,C,D,E,H,I,M where B contains '" + query_value + "' order by A asc";

			//error handler
			var getError = function (error, options, response) {
				 //console.log(error, options, response);

				 //no result found message
				 $("h2#search-error").text("");
				 if (response.html == "") {
					 $("h2#search-error").text("No matching certificate found. Plese check your certificate number. It is case sensitive. e.g. type A2 not a2.")
				 }
				 changeColor();
			 };

		  // Compile the Handlebars template for HR leaders.
		  var HRTemplate = Handlebars.compile($('#hr-template').html());

		  $('#results').sheetrock({
		   url: mySpreadsheet,
		   query: myQuery,
		   fetchSize: 30,
		   rowTemplate: HRTemplate,
			 callback: getError
		  });

		}	return false;
	}

	//set certificate status colors
	function changeColor(){
		$("h2.status-display").each(function(){
			//get certificate status
			var status_value = $(this).text();
			//apply colors
			if (status_value == "Active") {
				$(this).css("color", "green")
			}else{
				$(this).css("color", "orange")
			};
		});
	}

	$("input#searchbutton").on("click", function(e) {
		// Set Timeout
		clearTimeout($.data(this, 'timer'));

		// Set Search String
		var search_string = $(this).val();

		// Do Search
		if (search_string == '') {
			$("ul#results").fadeOut();
			$('h4#results-text').fadeOut();
		}else{
			$("ul#results").fadeIn();
			$('h4#results-text').fadeIn();
			$(this).data('timer', setTimeout(search, 200));
			};
	});


	//reload page to conduct new search
	$("input#resetbutton").click(function(){
		location.reload();
	});

});
