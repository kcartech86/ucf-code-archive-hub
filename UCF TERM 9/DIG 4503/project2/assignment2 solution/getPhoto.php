<?
    require 'apiKey.php';

    $url  = "http://api.flickr.com/services/rest/?method=flickr.photos.getInfo";
    $url .= "&api_key=".$apiKey;
    $url .= "&photo_id=".$_POST['photoId'];
    $url .= "&format=rest";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $curlResponse = curl_exec($ch);
    curl_close($ch);

    $xmlObject = simplexml_load_string($curlResponse);

    foreach($xmlObject->photo as $photo) {
        print "<div id='bigPhoto'>";

        print "<img src=\"http://farm".$photo['farm'];
        print ".staticflickr.com/".$photo['server'];
        print "/".$photo['id'];
        print "_".$photo['secret'];
        print ".jpg";
        print "\" alt=\"".$photo['id']."\" />";

        print "<h2>".$photo->title."</h2>";
        print "<p>Photo by: ".$photo->owner['username']."</p>";
        print "<p>Taken on: ".date('m/d/Y',strtotime($photo->dates['taken']));

        print "</div>";
    }
?>