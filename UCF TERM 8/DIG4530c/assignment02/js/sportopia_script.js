$(document).ready(function() {
	$('#insert').hide();
	$('#update').hide();
	$('#delete').hide();
	$('#featured').hide();
	$('.admin_ul li').hover(function () {
		$(this).css("cursor","pointer")
	});
	$('.admin_ul li').click(function () {
		if($(this).children("img").attr("src") == "img/plus.png") {
			$(this).parent().next().show();
			$(this).children("img").attr("src", "img/minus.png");
		} else {
			$(this).parent().next().hide();
			$(this).children("img").attr("src", "img/plus.png");
		}
	});
});