<?php 
     
    require_once("config.php"); 

    //The term we're looking for. 
    $term = $_POST['term']; 

    //Since we're only looking for mondays, then the latest time should be last monday, saves parsing thorugh a good chunk of the results. 
    $max = strtotime("last monday 11:59pm"); 

    // create a new cURL resource 
    $ch = curl_init(); 

    // set URL and other appropriate options 
    curl_setopt($ch, CURLOPT_URL, "http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=".API_KEY."&tags=".$term."&per_page=500&sort=date-taken-desc&format=rest&extras=date_taken&max_taken_date=".$max); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    // grab URL and pass it to the browser, returning XML object. 
    $xml = curl_exec($ch); 

    // close cURL resource, and free up system resources 
    curl_close($ch); 

    //DomDocument! 
    $dom = new domDocument(); 

    //Load 'er up! 
    $dom->loadXML($xml); 

    //Get the photos list 
    $photos =  $dom->getElementsByTagName('photo'); 

    $imgArray = array(); 

    //Parse through each list, build the url link, and set alt text. 
    foreach($photos as $photo) 
    { 

        $date = $photo->getAttribute('datetaken'); 

        if(date('l', strtotime($date)) == 'Monday') 
        { 
            $imgArray[]=array('image' => "http://farm".$photo->getAttribute('farm').".staticflickr.com/".$photo->getAttribute('server')."/".$photo->getAttribute('id')."_".$photo->getAttribute('secret'), "alt" => $photo->getAttribute('id')); 

        } 
        if(count($imgArray) == 40) 
        { 
            break; 
        } 
    } 
    echo json_encode(array('images' => $imgArray));     
?>