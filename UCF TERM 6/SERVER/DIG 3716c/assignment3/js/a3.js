// JavaScript Document

function randomImg() {
			
	var imgChoice = new Array('img/ad01.jpg','img/ad02.jpg',
							  'img/ad03.jpg','img/ad04.jpg',
							  'img/ad05.jpg','img/ad06.jpg',
							  'img/ad07.jpg','img/ad08.jpg',
							  'img/ad09.jpg','img/ad10.jpg');				
	var img1 = imgChoice[Math.floor(9*Math.random())];
	var whichImg = imgChoice[img1];
	return whichImg;
}
			
function showAdDetails(event) {
	/*
		<div id="ad_info">
			<p>Product/Service Description</p>
			<img src="img/ad01.jpg" alt="Vectron">
		</div>
	*/
	var imgPlacement = this.getAttribute('title');

	/*/if(document.getElementById('ad_deck')) {
		document.getElementById('ad_deck').parentNode.removeChild(document.getElementById('ad_deck'));
	}*/
	
	var divInfoContainer = document.createElement('div');
	divInfoContainer.setAttribute('id','ad_info');
	
	var paragraphAdInfo = document.createElement('p');
	
	if( randomImg()== 'img/ad01.jpg'){
		var paragraphAdText = document.createTextNode('4th Sword- We make only the finest mouse pens. Starting at $59.99 ');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	else if( randomImg()== 'img/ad02.jpg'){
		var paragraphAdText = document.createTextNode('Omni Cloud. AT Omni we offer multiple cloud computing software applications absolutely free. Just click and sign up. ');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	else if( randomImg()== 'img/ad03.jpg'){
		var paragraphAdText = document.createTextNode('Pagechangers.com. Offering web page updating, validating, and multimedia integration services for users lacking web code wizardry. Services start at $50. ');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	else if( randomImg()== 'img/ad04.jpg'){
		var paragraphAdText = document.createTextNode('APPtastic.com  Find all the fun games and apps that make you laugh and smile. Prices range from $0.10 to $5.00. ');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	else if( randomImg()== 'img/ad05.jpg'){
		var paragraphAdText = document.createTextNode('spaceneddle.org Need help in that Astronomy class? Vistit the ultimate inutuitve astronomy website today, absolutely free! Just create an account!  ');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	else if( randomImg()== 'img/ad06.jpg'){
		var paragraphAdText = document.createTextNode('TCPCelectronics.com offers only the most popular and best deals on touch screen personal computers.  ');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	else if( randomImg()== 'img/ad07.jpg'){
		var paragraphAdText = document.createTextNode('tutortime.edu. Struggling with classes or hw? Get exceptional tutoring remotely or locally through tutortime for a one time fee of $60.00. ');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	else if( randomImg()== 'img/ad08.jpg'){
		var paragraphAdText = document.createTextNode('VECTRONICS Mouse Engineering. Visit our page at vme.com to browse thousands of customizable mouse and keybourd combos. Featured here is the vectronics Cyborg grenade- $250.00. ');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	else if( randomImg()== 'img/ad09.jpg'){
		var paragraphAdText = document.createTextNode('whataboutwindows.com Find helpful, straightforward answers to your questions about any WINDOWS OS at the WaW forum page. Login for only $10 right now!!!');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	else{
		var paragraphAdText = document.createTextNode('Introducing the SlimHD with SLytunes. Half the price and twice as nice as those other lame Apple products.  ');
		paragraphAdInfo.appendChild(paragraphAdText);
		divInfoContainer.appendChild(paragraphAdInfo);
		
		var container = document.getElementById('ad_deck');
		container.appendChild(divInfoContainer);
	}
	event.preventDefault();
}

function createAdSpace(event) {
	//alert('inside createColor');
	
	var listItem1 = document.getElementById('img1');
	var adBox1 = listItem1.firstChild;
	var listItem2 = document.getElementById('img2');
	var adBox2 = listItem2.firstChild;
	var listItem3 = document.getElementById('img3');
	var adBox3 = listItem3.firstChild;
	
	
	var add1 = randomImg();
	adBox1.style.backgroundColor = add1;
	adBox1.setAttribute('title',add1);
	adBox1.addEventListener('click',showAdDetails,false);

	var add2 = randomImg();
	adBox2.style.backgroundColor = add2;
	adBox2.setAttribute('title',add2);
	adBox2.addEventListener('click',showAdDetails,false);

	var add3 = randomImg();
	adBox3.style.backgroundColor = add3;
	adBox3.setAttribute('title',add3);
	adBox3.addEventListener('click',showAdDetails,false);

	
	// what I have now - <a href=""></a>
	// what I want     - <a href="" title="#672575"></a>
	
	event.preventDefault();
}

window.onload = function() {
	var images = document.getElementsByTagName('img');
	var firstImage = images[0];
	var anchor = firstImage.firstChild;
	anchor.addEventListener('click',createAdSpace,false);
	
	
	
}