$(document).ready(function() {
	$('#search_button').bind('click',function(e) {
		e.preventDefault();
		$.ajax({
			url: 'getThumbs.php', 
			dataType: 'html',
			success: function(response) {
				//clear display area
				$('#photoArea ul').empty();
				//insert display response 
				$('#photoArea ul').append($(response));
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
				$('#fullPhoto').append($(response));
			},
			error: function(response) {
				console.log('Error happened check this out: ' + response);
			}
		});
	});
});