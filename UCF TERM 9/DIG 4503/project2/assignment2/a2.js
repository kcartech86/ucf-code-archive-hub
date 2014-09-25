$(document).ready(function() {
	$('#search_button').bind('click',function(e) {
		e.preventDefault();
		$.ajax({
			url: 'getThumbs.php', 
			data: 'search=' + $('input[type=search]').val(),
			dataType: 'html',
			method: 'post',
			success: function(response) {
				//clear display area
				$('#photoArea ul').empty();
				//insert display response 
				$('#photoArea ul').appendTo($(response));
			},
			error: function(response) {
				console.log('Error happened check this out: ' + response);
			}
		});
	});
	
	$('a').bind('click',function(e) {
		e.preventDefault();
		$.ajax({
			url: 'getPhoto.php', 
			dataType: 'html',
			success: function(response) {
				//clear display area
				$('#fullPhoto').empty();
				//insert display response
				$('#fullPhoto').appendTo($(response));
			},
			error: function(response) {
				console.log('Error happened check this out: ' + response);
			}
		});
	});
	
	$('header').prepend('<img id="html5pic" src="img/HTML5_Logo_64.png" alt="HTML5 Badge Image">');

});