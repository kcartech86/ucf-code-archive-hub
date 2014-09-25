<?php

	include 'apiAccess.php';
	
	$searchTerm = $_POST['search'];	
	//$searchTerm = "cats";
	//Thanks to Kevin for the tip on using strtotime and testing with cats
	$monday = strtotime("last monday 11:59pm");

	$url  = "http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=".$appKey."&tags=".$searchTerm."&per_page=40&sort=date-taken-desc&format=rest&extras=date_taken&max_taken_date=".$monday;
	
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $curlResponse = curl_exec($ch);
    curl_close($ch);
	
	$xmlObject = simplexml_load_string($curlResponse);
	
	/*
    print "<h1>Test to see if connecting and showing</h1>";	
	print "<pre>".htmlentities($xmlObject->asXML())."</pre>";
	*/
	
    foreach($xmlObject->photo as $photo) 
    {
        $date = $photo->getAttribute('datetaken'); 

        if(date('l', strtotime($date)) == 'Monday') 
        { 
			$farmId = $photo->getAttribute('farm');
			$serverId = $photo->getAttribute('server');
			$imgId = $photo->getAttribute('id');
			$secret = $photo->getAttribute('secret');
			$thumbUrl = "http://farm".$farmId.".staticflickr.com/".$serverId."/".$imgId."_".$secret."_q.jpg"; 
			$pageHop = '#fullPhoto';
			
			print "<li><a href=".$pageHop."><img src=".$thumbUrl." alt=".$imgId."></a></li>";
        } 
        
    } 
	
?>