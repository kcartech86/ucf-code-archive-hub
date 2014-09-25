$(document).ready(function() {
	$('form').bind('submit',function(e) {
		e.preventDefault();
		$.ajax({
			data: 'searchTerm=' + $('input#searchTerm').val(),
			dataType: 'html',
			type: 'post',
			url: 'getReps.php',
			success: function(responseData) {
				$('#repsResult').html(responseData);
			},
			error: function(data) {
				console.log('Twitter links load error');
			}
		});
	});
});