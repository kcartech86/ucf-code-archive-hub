<?php 
     
    require_once("config.php"); 

    //Gets the id that Flickr should look for. 
    $photo_id = $_POST['id'];  

    // create a new cURL resource 
    $ch = curl_init(); 

    // set URL and other appropriate options 
    curl_setopt($ch, CURLOPT_URL, "http://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=".API_KEY."&photo_id=".$photo_id."&format=rest"); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    // grab URL and pass it to the browser, returning the xml object. 
    $xml = curl_exec($ch); 

    // close cURL resource, and free up system resources 
    curl_close($ch); 

    //New DomDocument. I like this better than the simple xml thing. 
    $dom = new domDocument(); 

    //Load in the returned xml 
    $dom->loadXML($xml); 

    //Parse through for the elements we're looking for (added a few extra). 
    $owner    = $dom->getElementsByTagName('owner')->item(0)->getAttribute('username'); 
    $title    = $dom->getElementsByTagName('title')->item(0)->firstChild->nodeValue; 
    $tags     = $dom->getElementsByTagName('tag'); 
    $views    = $dom->getElementsByTagName('photo')->item(0)->getAttribute('views'); 
    $date     = $dom->getElementsByTagName('dates')->item(0)->getAttribute('taken'); 

    //Goes through the tages, array's them, then implodes with a comma. Have to do this because tags are seperated into seperate....uh....tags. 
    foreach($tags as $tag) 
    { 
        $tagNames[] = $tag->firstChild->nodeValue; 
    } 
    $tagNames = implode(", ", $tagNames); 

    $infoArray = array( 
        'owner' => $owner,  
        'title' => $title,  
        'tags'  => $tagNames, 
        'views' => $views, 
        'date'  => date("F d, Y", strtotime($date)), 
    ); 

    echo json_encode(array('info' => $infoArray)); 

     
?>