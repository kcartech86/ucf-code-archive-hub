// JavaScript Document

//grab wiki links, set up the wikiveiwer for each wikilink
$(document).ready(function() {
	$('form').bind('submit',function(e) {
		e.preventDefault();
		$.ajax({
			data: 'searchTerm=' + $('input#searchTerm').val(),
			dataType: 'html',
			type: 'post',
			url: 'getwikis.php',
			success: function(responseData) {
				$('#wikiDiv').html(responseData);
				$('#wikiDiv a').bind('click',function(e2) {
					e2.preventDefault();
					$.ajax({
						url: $(this).attr('href'), 
						dataType: 'html',
						data: null,
						method: 'get',
						success: function(response) {
							// clear diplay, insert displayResponse stuff
							$('#wikiviewer').innerHtml("");
							$('#wikiviewer').append($('<iframe src="' + response + '"></iframe>'));
						},
					});
				});
			},
		});
	});
});
			


//get list for google books, set up bookviewer for each link
$(document).ready(function() {
	$('form').bind('submit',function(e) {
		e.preventDefault();
		$.ajax({
			 data: 'searTerm=' + $('input#searchTerm').val(),
			 dataType: 'html',
			 type: 'post',
			 url: 'getbooks.php',			 
			success: function(responseData) {
				$('#bookDiv').html(responseData);
				$('#bookDiv a').bind('click',function(e2) {
					e2.preventDefault();
					$.ajax({
						url: $(this).attr('href'), 
						dataType: 'html',
						data: null,
						method: 'get',
						success: function(response) {
							// clear diplay, insert displayResponse stuff
							$('#bookviewer').innerHtml("");
							$('#bookviewer').append($('<iframe src="' + response + '"></iframe>'));
						},
					});
				});
			},
		});
	});
});

//end script