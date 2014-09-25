function sendRequest(fileName) {
	var xhr = new XMLHttpRequest();
	if (xhr) {
		xhr.onreadystatechange = function() {
			displayResponse(xhr);
		};
		xhr.open("GET", fileName, true);
		xhr.send(null);
	}
}

function displayResponse(xhr) {
	
	if (xhr.readyState == 4) {
		if (xhr.status == 200 || xhr.status == 304) {
			
			
			var splitResponse = xhr.responseText.split('*');
			var anchor = document.getElementsByTagName('a');
			if(anchor[0].getAttribute("id") == "link1"){
				
				for(var i=0; i<splitResponse.length; i++) {				
					var respAnswers = document.getElementById('q1answers');
					var respCount = document.getElementById('q1count');
					respAnswers.innerHTML = "";
					respCount.innerHTML = "";
					var x1=0;
					for(var i=0; i<splitResponse.length; i++) {
						if(splitResponse[i]=="q1"){
							x1 +=1;
							respCount.innerHTML = "<p>" + x1 + "</p>";								
							respAnswers.innerHTML += "<li>" + splitResponse[i+1] + "</li>";	
						}
					}			
					
				}
			}
			if(anchor[1].getAttribute("id") == "link2"){				
			
				for(var i=0; i<splitResponse.length; i++) {				
					var respAnswers2 = document.getElementById('q2answers');
					var respCount2 = document.getElementById('q2count');
					respAnswers2.innerHTML = "";
					respCount2.innerHTML = "";
					var x2=0;
					for(var i=0; i<splitResponse.length; i++) {
						if(splitResponse[i]=="q2"){
							x2 +=1;
							respCount2.innerHTML = "<p>" + x2 + "</p>";								
							respAnswers2.innerHTML += "<li>" + splitResponse[i+1] + "</li>";	
						}
					}			
					
				}
			}
			if(anchor[2].getAttribute("id") == "link3"){				
			
				for(var i=0; i<splitResponse.length; i++) {				
					var respAnswers3 = document.getElementById('q3answers');
					var respCount3 = document.getElementById('q3count');
					respAnswers3.innerHTML = "";
					respCount3.innerHTML = "";
					var x3=0;
					for(var i=0; i<splitResponse.length; i++) {
						if(splitResponse[i]=="q3"){
							x3 +=1;
							respCount3.innerHTML = "<p>" + x3 + "</p>";								
							respAnswers3.innerHTML += "<li>" + splitResponse[i+1] + "</li>";	
						}
					}			
					
				}
			}
			if(anchor[3].getAttribute("id") == "link4"){				
			
				for(var i=0; i<splitResponse.length; i++) {				
					var respAnswers4 = document.getElementById('q4answers');
					var respCount4 = document.getElementById('q4count');
					respAnswers4.innerHTML = "";
					respCount4.innerHTML = "";
					var x4=0;
					for(var i=0; i<splitResponse.length; i++) {
						if(splitResponse[i]=="q4"){
							x4 +=1;
							respCount4.innerHTML = "<p>" + x4 + "</p>";								
							respAnswers4.innerHTML += "<li>" + splitResponse[i+1] + "</li>";	
						}
					}			
					
				}
			}
			if(anchor[4].getAttribute("id") == "link5"){				
			
				for(var i=0; i<splitResponse.length; i++) {				
					var respAnswers5 = document.getElementById('q5answers');
					var respCount5 = document.getElementById('q5count');
					respAnswers5.innerHTML = "";
					respCount5.innerHTML = "";
					var x5=0;
					for(var i=0; i<splitResponse.length; i++) {
						if(splitResponse[i]=="q5"){
							x5 +=1;
							respCount5.innerHTML = "<p>" + x5 + "</p>";								
							respAnswers5.innerHTML += "<li>" + splitResponse[i+1] + "</li>";	
						}
					}			
					
				}
			}
			if(anchor[5].getAttribute("id") == "link6"){				
			
				for(var i=0; i<splitResponse.length; i++) {				
					var respAnswers6 = document.getElementById('q6answers');
					var respCount6 = document.getElementById('q6count');
					respAnswers6.innerHTML = "";
					respCount6.innerHTML = "";
					var x6=0;
					for(var i=0; i<splitResponse.length; i++) {
						if(splitResponse[i]=="q6"){
							x6 +=1;
							respCount6.innerHTML = "<p>" + x6 + "</p>";								
							respAnswers6.innerHTML += "<li>" + splitResponse[i+1] + "</li>";	
						}
					}			
					
				}
			}
		}
	}
}
window.onload = function() {
	var anchor = document.getElementsByTagName('a');
	for(var i=0; i<anchor.length; i++) {
		anchor[i].addEventListener('click', function(e) {
			e.preventDefault();
			sendRequest(this.href);
		}, false);
	}
}
