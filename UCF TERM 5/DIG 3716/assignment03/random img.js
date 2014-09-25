// JavaScript Document

function loadImgs()
{
	var imgArray= Array(3);
	
	imgArray[0] = new Image(400, 712);
	imgArray[0].src = "img/Zune_Girl 01.jpg";
	imgArray[1] = new Image(400, 712);
	imgArray[1].src = "img/Zune_Girl 02.jpg";
	imgArray[2] = new Image(400, 712);
	imgArray[2].src = "img/Zune_Girl 03.jpg";
	imgArray[3] = new Image(400, 712);
	imgArray[3].src = "img/Zune_Girl 04.jpg";	
	
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
	
/*	var random_number = Math.floor(5*Math.random()); 

	var newImg = document.createElement('img');	
	newImg.setAttribute("id" , "placeholder");
	newImg.setAttribute("src", imgArray[random_number] );
	newImg.setAttribute("width","400");
	newImg.setAttribute("height","712");
	newImg.setAttribute("alt","banner place holder");
		
	var display = document.getElementById("banner");
	display.appendChild(newImg);
	
} 


<img src="img/Zune_Girl 01.jpg" width="400" height="712" alt="nuke" />
*/

