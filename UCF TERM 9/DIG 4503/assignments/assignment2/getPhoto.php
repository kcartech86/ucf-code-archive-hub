<?php

	include 'apiAccess.php';
	
    $photoId = $_POST['id'];
  //$photoId = "6842068934";
   
	$url  = "http://api.flickr.com/services/rest/?method=flickr.photos.getInfo";
	$url .= "&api_key=".$appKey;
	$url .= "&photo_id=".$photoId;
	$url .= "&format=rest";

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
	foreach($xmlObj->photo as $photo){
	
		$author = $photo->owner->getAttribute('username');
		$title = $photo->title ;
		$basicDate = $photo->dates->getAttribute('taken');
		$dateTaken =  date("F d, Y", strtotime($basicDate));
		
		$farmId = $photo->getAttribute('farm');
		$serverId = $photo->getAttribute('server');
		$imgId = $photo->getAttribute('id');
		$secret = $photo->getAttribute('secret');
		$fullPhotoUrl = "http://farm".$farmId.".staticflickr.com/".$serverId."/".$imgId."_".$secret."_-.jpg"; 
		
		print "<img src=".$fullPhotoUrl." alt=".$title." />";
					
		print "<ul>";
		print "<li>
					Title: ".$title."
			   </li>";
		print "<li>
					Photo Author: ".$author."
			   </li>";
		print "<li>
					Date Taken: ".$dateTaken."
			   </li>";
		print "</ul>";
		
	}

?>