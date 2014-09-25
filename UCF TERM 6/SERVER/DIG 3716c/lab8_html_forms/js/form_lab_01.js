// Form 1 js

function processFrom(event) {
	event.preventDefault();
	console.log(document.loginform.email.value);
	console.log(document.loginform.password.value);
	if(document.loginfrom.logged.checked)
		console.log(document.loginform.logged.value);
	
}

window.onload = function() {
	var theform = document.getElementsByTagName('form');
	form[0].addEventListener('submit',processForm, false);
}
	