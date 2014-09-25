function validateFields(event) {
	var error_array = new Array();

//First name validation//////////////////////////////////
	var Fname = document.orderForm.firstName.value;
	var FnameError = document.getElementById('err01');
	if(Fname.length > 0){
		FnameError.style.display="none";	
	}	
	else {
		error_array.push('First Name:');
		FnameError.style.display="block";
	}
//Last name validation///////////////////////////////////				
	var Lname = document.orderForm.lastName.value;
	var LnameError = document.getElementById('err02');
	if(Lname.length > 0) {
		LnameError.style.display="none";
	}	
	else {
		error_array.push('Last Name:');
		errorTwo.style.display="block";
	}
//Email validation////////////////////////////////////////
	var Email = document.orderForm.email.value;
	var EmailError = document.getElementById('err03')
	if((Email.length > 0) && (Email.indexOf('@')!= -1)) {
		EmailError.style.display="none";
	}	
	else {
		error_array.push('Email:');
		EmailError.style.display="block";
	}
//Card number validation//////////////////////////////////	
	var cardNum = document.orderForm.cardNumber.value;
	var cardNumError = document.getElementById('err04');
	if(cardNum.length > 0) {
		cardNumError.style.display="none";
	}	
	else {
		error_array.push('Credit Card Number:');
		cardNumError.style.display="block";
	}
//Card expiration validation//////////////////////////////
	var validDate = /(^[0]{1})([1-9]{1})\/{1}([0-9]{2}$)|(^[1]{1})([0-2]{1})\/{1}([0-9]{2})$/;
	var cardExpire = document.orderForm.cardExp.value;
	var cardExpError = document.getElementById('err05');
	if((cardExpire.length > 0) && (cardExpire.match(validDate))) {
		cardExpError.style.display="none";
	}	
	else {
		error_array.push('Credit Card Exp. :');
		cardExpError.style.display="block";
	}
//Card type validation////////////////////////////////////
	var cardPicker;
	var amexType = false;
	var mcType = false;
	var visaType = false;
	var amexCheck = /(^[3]{1})([47]{1})([0-9]{13}$)/;
	var mcCheck = /(^[5]{1})([1-5]{1})([0-9]{14}$)/;
	var visaCheck = /(^[4]{1})([0-9]{15}$)/;

	if(document.orderForm.cards.value == 'amExp'){
		amexType = true;
		cardPicker ="American Express";
	}
	else if(document.orderForm.cards.value == 'master'){
		mcType = true;
		cardPicker ="Mastercard";
	}	
	else{
		visaType = true;
		cardPicker ="Visa";
	}

	if((amexType == true) && (cardNum.match(amexCheck))){
		cardNumError.style.display="none";
	}
	else{
		cardNumError.style.display="block";
	}

	if((mcType == true) && (cardNum.match(mcCheck))){
		cardNumError.style.display="none";
	}
	else{
		cardNumError.style.display="block";
	}
	
	if((visaType == true) && (cardNum.match(visaCheck))){
		cardNumError.style.display="none";
	}
	else{
		cardNumError.style.display="block";
	}		
//END Card type validation//////////////////////////////
	if((error_array.length>0)){
		//alert("Warning! There are "+error_array.length+" errors!");
		event.preventDefault();
	}
	else{
		processForm();
		event.preventDefault();			
		}
}

function processForm()
{
	var pizza = false;
	var knots= false;
	var coke = false;
	var amex2 = false;
	var master2 = false;
	var visa2 = false;
	var printout; //message;
	var cardChoice;
	var imageOrder; //orderPic
	var firstName = document.orderForm.firstName.value;
	var lastName = document.orderForm.lastName.value;
	var email = document.orderForm.email.value;
	var cardNumber = document.orderForm.cardNumber.value;
	var cardExpire = document.orderForm.cardExp.value;
			
	if(document.orderForm.cards.value == 'amExp'){
		amex2 = true;
		cardChoice ="American Express";
	}		
	else if(document.orderForm.cards.value == 'master'){
		master2 = true;
		cardChoice ="Mastercard";
	}	
	else{
		visa2 = true;
		cardChoice ="Visa";
	}

	if(document.orderForm.elements['pep_pizza'].checked) {
		pizza = true;
	}

	if(document.orderForm.elements['knots'].checked) {
		knots = true;
	}

	if(document.orderForm.elements['coke'].checked) {
		coke = true;
	} 

	if(pizza == true && knots == true && coke == true){
		printout ="You've ordered a Pepperoni Slice, some Garlic Knots, and a 2 liter Coke.";
		imageOrder = "0123";
	}		
	else if(pizza == true && knots == true){
		printout ="You've ordered a Pepperoni Slice and some Garlic Gnots.";
		imageOrder = "0012";

	}
	else if(pizza == true && coke == true){
		printout ="You've ordered a Pepperoni Slice and a 2 liter Coke.";
		imageOrder = "0013";
	}		
	else if(knots == true && coke == true){
		printout ="You've ordered some Garlic Knots and a 2 liter coke.";
		imageOrder = "0023";
	}
	else if(pizza == true){
		printout ="You've ordered a Pepperoni Slice.";
		imageOrder = "0001";
	}	
	else if(knots == true){
		printout ="You've ordered some Garlic Knots.";
		imageOrder = "0002";
	}
	else if(coke == true){
		printout ="You've ordered a 2 liter Coke.";
		imageOrder = "0003";
	}		
	else{
		printout ="You didn't place an order!";
		imageOrder = "empty";
	}

	var formResults = " "+firstName+" "+lastName+": "+message+" You selected "+cardChoice+" as your card type. Your credit card number is "+credNum+" which will expire"+credExp+" and your e-mail is "+email+". Thank you for ordering from Pepe's Pizza Pies!";;

	var p2 = document.getElementById('entryform');
	p2.parentNode.removeChild(p2);
			
	var thecontainer = document.getElementById('container');			
	var formresults = document.createElement('div');
	formresults.setAttribute("id","formReplaced");
	theconatiner.appendChild(formresults);			
			
	var newPosition = document.getElementById('formReplaced');
	var placedOrder = document.createElement('h1');
	var OrderText = document.createTextNode('Your order consists of:');
	placedOrder.appendChild(OrderText);
	placedOrder.setAttribute("id","showText");
	newPosition.appendChild(placedOrder);		
			
	var createMsg = document.createElement('div');
	createMsg.setAttribute("id","msgOutput");
	theconatiner.appendChild(createMsg);

	var getMsg = document.getElementById('msgOutput');
	var showMsg = document.createElement('p');
	var showMsgText = document.createTextNode(formresults);
	showMsg.appendChild(showMsgText);
	showMsg.setAttribute("id","msgEdit");
	getMsg.appendChild(showMsg);

		
	var imgtainer = document.getElementById('imgWindow');
	var firstimg = document.getElementByID('startimg');
	imgtainer.removeChild(firstimg);
	var newImg = document.createElement('img');
	newImg.setAttribute("src","img/"+orderPic+".jpg");
	newImg.setAttribute("alt","yourmeal");
	newImg.setAttribute("id","orderImg");
	imgtainer.appendChild(newImg);

}


function setupForm() {
	var forms = document.getElementsByTagName('form');
	forms[0].addEventListener('submit',validateFields,false);
}

window.onload = function() {
	setupForm();
}