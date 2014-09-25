<?
	require 'apiInfo.php';
	
	//Build the url starting with endpoint
	$url ="https://www.googleapis.com/books/v1/volumes";
	//Use the search term(s) entered by the user.	
	$searchString = $_POST['searchTerm'];
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
		
	$url .="?q=".$searchString;
	//Search for term as title
	$url .="+intitle:".$searchString;	
	//only want first five results
	$url .="&maxResults=5";
	//only want results to be free ebooks
	$url .="&filter=free-ebooks";
	//Attach api key for authentication
	$url .="&key=".$bookKey;
	
	$gBooksJson = file_get_contents($url);
	
	$jsonDecoded = json_decode($gBooksJson);
	/*
    print "<pre>";
    var_dump($jsonDecoded);
    print "</pre>";
	*/	
	$counter = 0;
	echo "<ul>";
	foreach($jsonDecoded->items as $items) {
		echo "<li>";
		echo "<a href=\"";
		echo $items->accessInfo->webReaderLink;
		echo "\">";
		$counter++;
		echo "Book Link ".$counter.": ";
		echo $items->volumeInfo->title;
		echo "</a>";
		echo "</li>";
		
	}
	echo "</ul>";

?>