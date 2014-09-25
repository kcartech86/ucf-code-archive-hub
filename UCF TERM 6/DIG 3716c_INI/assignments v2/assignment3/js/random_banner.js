// JavaScript Document

function loadImgs()
{
	var imgArray= Array(3);
	
	imgArray[0] = new Image(800, 150);
	imgArray[0].src = "img/banner01.png";
	imgArray[1] = new Image(800, 150);
	imgArray[1].src = "img/banner02.png";
	imgArray[2] = new Image(800, 150);
	imgArray[2].src = "img/banner03.png";
	imgArray[3] = new Image(800, 150);
	imgArray[3].src = "img/banner04.png";	
	
	var display = document.getElementById("header");
	
	if (display.firstChild != null) 
		{
		 	var text_node_to_remove = display.firstChild;
			display.removeChild(text_node_to_remove);
		}
		
	var random_number = Math.floor(4*Math.random());
	var newImg = document.createElement('img');	
	display.appendChild(newImg);
	newImg.src = imgArray[random_number].src;
	
	
}
			
			window.onload = loadImgs;