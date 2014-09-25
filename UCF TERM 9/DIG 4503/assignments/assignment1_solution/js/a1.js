function sendRequest(fileName, anchorId){
	var xhr = new XMLHttpRequest();
	if(xhr){
		xhr.onreadystatechange = function() {
			displayResponse(xhr, anchorId);
		}
		xhr.open('GET',fileName,true);
		xhr.send(null);
	}
}

function displayResponse(xhr, anchorId) {
	if((xhr.readyState == 4) && ((xhr.status == 200) || (xhr.status == 304 ))) {
		document.getElementById('answer1div').innerHTML = "";
		document.getElementById('answer2div').innerHTML = "";
		document.getElementById('answer3div').innerHTML = "";
	
		var splitResponseText = xhr.responseText.split("\n");
		for(x=0;x<splitResponseText.length;x++) {
			var splitByAsterisk = splitResponseText[x].split("*");
			
			if((anchorId == 'a1anchor') && (splitByAsterisk[0] == 'q1')){
				var divToUpdate = document.getElementById('answer1div');
				divToUpdate.innerHTML += "<p>" + splitByAsterisk[1] + "</p>";
				
			}else if((anchorId == 'a2anchor') && (splitByAsterisk[0] == 'q2')){
				var divToUpdate = document.getElementById('answer2div');
				divToUpdate.innerHTML += "<p>" + splitByAsterisk[1] + "</p>";
				
			}else if((anchorId == 'a3anchor') && (splitByAsterisk[0] == 'q3')){
				var divToUpdate = document.getElementById('answer3div');
				divToUpdate.innerHTML += "<p>" + splitByAsterisk[1] + "</p>";
			}
			
		}
	}
}

window.onload = function() {
	var anchors = document.getElementsByTagName('a');
	for(i=0;i<anchors.length;i++){
		anchors[i].addEventListener('click', function(e) {
			e.preventDefault();
			sendRequest(this.href, this.getAttribute('id'));
		}, false);
	}
}
			