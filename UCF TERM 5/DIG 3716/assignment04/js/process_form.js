// JavaScript Document
 
function validateData(){
		document.myform.onsubmit = processForm;
 	}
 
 	function processForm() {
 	
	if(document.myform.first_name.value.length == 0) {
 		alert("first name is invalid!");
	}
		
	if(!document.myform.last_name.value.match(/[A-Z]/)){
		alert("capitalize last name!");
	}
	
	if(!document.myform.phone_number.value.match(/[digit]/)){
		alert("must be XXX-XXX-XXXX format numbers only.")
	}
	
	if(!document.myform.email_name.value.match(/ \w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6} /)){
		alert("must be a valid email!");
	}
	
	if(!document.myform.sulley_name.value.match("")){
		alert("must be a Sulley adress and include a tilde!");
	}
	

 	return false;
 	}
	window.onload = validateData;