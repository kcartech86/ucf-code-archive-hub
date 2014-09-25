<?php	
	//Wikimedia endpoint
	$url = "http://en.wikipedia.org/w/api.php";
	//Using opensearch parameter 
	$url .="?action=opensearch";
	//Use the search term(s) entered by the user.	
	$searchString = $_POST['searchTerm'];
	///*test string*/$searchString = "wireless electricity";
	$i = 0;
	$space = " ";
	$plus = "+";
	$haspaces = substr_count($searchString, $space);
	for($i=0; $i< (strlen($searchString)); $i++){
		if( $haspaces > 0){
			$searchArray = str_split($searchString);
			if($searchArray[$i] == $space){
				$searchArray[$i] = $plus;
			}
			$searchString = implode("", $searchArray);
		}	
	}	
	///*Check to see the "+" is properly inserted*/echo $searchString."<br/>";	
	$url .="&search=".$searchString;
	//Return first five results
	$url .="&limit=5";
	$url .="&namespace=0";
	//Return results as xml
	$url .="&format=xml";	
	
	/*copy/paste in browser to check url construct works properly*/
	//$fullUrl = "http://en.wikipedia.org/w/api.php?action=opensearch&search=harry+potter&limit=5&namespace=0&format=xml";
	
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: ResearchIt/1.0 (http://sulley.dm.ucf.edu/~ky775779)"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $curlResponse = curl_exec($ch);
    curl_close($ch);
	
	$xmlObject = simplexml_load_string($curlResponse);

	$counter = 0;
	echo "<ul>";
	foreach($xmlObject->Section->Item as $item) {
		echo "<li>";
		echo "<a href=\"";
		echo $item->Url;
		echo "\">";
		$counter++;
		echo "Wiki Link ".$counter.": ";
		echo $item->Text;
		echo "</a>";
		echo "</li>";
	}
	echo "</ul>";
	
	
?>