<?php

	include 'apiAccess.php';
	
	//$searchTerm = $_POST['term'];	
	
	$searchTerm = "cats";
	//Thanks to Kevin for the tip on using strtotime
	$monday = strtotime("last monday 11:59pm");

	$url  = "http://api.flickr.com/services/rest/?method=flickr.photos.search";
	$url .= "&api_key=".$appKey;
	$url .= "&tags=".$searchTerm;
	$url .= "&per_page=100";
	$url .= "&sort=date-taken-desc";
	$url .= "&format=rest";
	$url .= "&extras=date_taken";
	$url .= "&max_taken_date=".$monday; 	

	$ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $curlResponse = curl_exec($ch);
    curl_close($ch);
	
	$xmlObj = simplexml_load_string($curlResponse);
	
    print "<h1>Test to see if connecting and showing</h1>";
	
	print "<pre>".htmlentities($xmlObj->asXML())."</pre>";
	
?>