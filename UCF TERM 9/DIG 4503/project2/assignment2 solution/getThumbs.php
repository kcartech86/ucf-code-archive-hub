<?
    require 'apiKey.php';

    $url  = "http://api.flickr.com/services/rest/?method=flickr.photos.search";
    $url .= "&api_key=".$apiKey;
    $url .= "&text=".$_POST['searchTerm'];
    $url .= "&extras=date_taken";
    $url .= "&per_page=40";
    $url .= "&format=rest";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $curlResponse = curl_exec($ch);
    curl_close($ch);

    $xmlObject = simplexml_load_string($curlResponse);

    print "<ul>";
    foreach($xmlObject->photos->photo as $photo) {
        if(date('l',strtotime($photo['datetaken'])) == 'Monday') {
            print "<li>";
            print "<img src=\"http://farm".$photo['farm'];
            print ".staticflickr.com/".$photo['server'];
            print "/".$photo['id'];
            print "_".$photo['secret'];
            print ".jpg";
            print "\" alt=\"".$photo['id']."\" />";
            print "</li>";
        }
    }
    print "</ul>";
?>