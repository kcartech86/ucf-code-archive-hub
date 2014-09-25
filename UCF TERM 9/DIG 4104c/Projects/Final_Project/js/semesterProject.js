// JavaScript Document

//grab wiki links
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
			},
			error: function(data) {
				console.log('Wiki links load error');
			}
		});
	});
});

//get list for google books
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
			 },
			 error: function(data) {
			 	console.log('Book links load error');
			 }
		});
	});
});


//set up the wikiveiwer for each wikilink
//<iframe src="http://www.w3schools.com"></iframe>


//set up the book veiwer for each link
//<iframe src="http://www.w3schools.com"></iframe>