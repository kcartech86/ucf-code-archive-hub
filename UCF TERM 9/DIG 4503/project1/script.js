function sendRequest() {
	var xhr = new XMLHttpRequest();
	if (xhr) {
		xhr.onreadystatechange = function() {
			displayResponse(xhr);
		};
		xhr.open("GET", "answers.html", true);
		xhr.send(null);
	}
}

window.onload = prepareLinks;

function prepareLinks(){
	
	var links = document.getElementsByTagName("a");
	for (var i=0; i<links.length; i++){
		if (links[i].getAttribute("class")=="ansclick"){
			links[i].onclick = function() {
				displayAnswers(this.getAttribute("href"));
				return false;
			}
		}
	}
}

function displayAnswers(xhr) {
				if (xhr.readyState == 4) {
					if (xhr.status == 200 || xhr.status == 304) {
						
						var splitResponse = xhr.responseText.split('+');
						for(var i=0; i<splitResponse.length; i++) {
							console.log(i + ": " + splitResponse[i]);
						}
						
						var responseDiv = document.getElementById('responseDiv');
						responseDiv.innerHTML = "";
						
						for(var i=0; i<splitResponse.length; i++) {
							responseDiv.innerHTML += "<h3>" + splitResponse[i] + "</h3>";
						}
					}
			  	}
			}