$(document).ready(function() {
	$.ajax({
		url: 'getThumbs.php',
		dataType: 'html',
		success: function(response) {
			$('#photoArea ul').html(response);
		}
	});
	
	
});