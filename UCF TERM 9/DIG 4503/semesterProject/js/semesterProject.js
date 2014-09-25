// JavaScript Document


$(document).ready(function(){						   
	$('#header').prepend('<img id="html5pic" src="img/HTML5_Logo_64.png" alt="HTML5 Badge Image">');						   
});

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


//set up the wikiveiwer for each wikilink, do the same for google links
//<iframe src="http://www.w3schools.com"></iframe>

$(document).ready(function() {
	$('#wikiDiv a').bind('click',function(e) {
		e.preventDefault();
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
			error: function(response) {
				console.log('error happened: ' + response);
			}
		});
	});
});


$(document).ready(function() {
	$('#bookDiv a').bind('click',function(e) {
		e.preventDefault();
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
			error: function(response) {
				console.log('error happened: ' + response);
			}
		});
	});
});
