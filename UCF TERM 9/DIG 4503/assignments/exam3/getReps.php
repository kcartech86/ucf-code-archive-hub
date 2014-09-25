<?
//getReps.php
//include necessary apiKeys
require 'apiKey.php';
//build the api url
$url = "http://whoismyrepresentative.com/";
$url .="getall_mems.php";

$searchString = $_POST['searchTerm'];
/*Test search data
$searchString = "32909";
*/
$url .="?zip=".$searchString;
//output json
$url .="&output=json";
//curl request, get json string. Curl not needed for this part!
/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
$curlResponse = curl_exec($ch);
curl_close($ch);
*/
$getReps = file_get_contents($url);
$jsonDecoded = json_decode($getReps);
/*
print "<pre>";
var_dump($jsonDecoded);
print "</pre>";
*/
//parse json results into array of representative names
$repArray = array();
$counter = 0;
foreach($jsonDecoded->results as $results){
	$repArray[$counter] = $results->name;
	$counter++;
}
/*
var_dump($repArray);
*/
//iterate through new array and split first and last names
$firstName = array();
$lastName = array();
for($i=0; $i<(count($repArray)); $i++){
	$splitNameArray= explode(" ", $repArray[$i]);
	$firstName[$i] = $splitNameArray[0];
	$lastName[$i] = $splitNameArray[1];
}
/*
var_dump($firstName);
echo "<br/>";
var_dump($lastName);
*/

//new url and curl request to sunlight services api

/*example url
$exurl = "http://services.sunlightlabs.com/api/
legislators.getList
.json
?apikey=5054571105464627bd877e54066ef7c3
&firstname=Bill
&lastname=Nelson"
*/
//build url
$url2 = "http://services.sunlightlabs.com/api/";
$url2 .= "legislators.getList";
$url2 .= ".json";
$url2 .= "?apikey=".$key;
foreach ($firstName as $fname){
	$url2 .="&firstname=".$fname;
} 
foreach ($lastName as $lname){
	$url2 .="&lastname=".$lname;
}
//curl request json
$getReps2 = file_get_contents($url2);
$jsonDecoded2 = json_decode($getReps2);
//parse json response to get twitter user names
foreach ($jsonDecoded2->response->legislators as $legislators){
	echo "<h1>".$legislators->legislator->firstname." ";
	echo $legislators->legislator->lastname."'s";
	echo " twitter account link. </h1>";
//create a link to twitter account using twitter + username
	$twitterSite="twitter.com";
	$twitterID = ($legislators->legislator->twitter_id) ;
	if($twitterID == "null"){
	//if no twitter username, then fail whale shows instead
		echo "<p>No twitter user account for this person.";
		echo "<img src=\"";
		echo "img/fail-whale.png\"";
		echo " alt=\"Fail Whale, No Twitter for Them";
		echo "\"></p><br/>";
	}
	else{
		echo "<a href=\"";
		echo "http://www.";
		echo $twitterSite."/".$twitterID;
		echo "\">";
		echo $legislators->legislator->firstname."'s Twitter";
		echo " Link";
		echo "</a><br/>";	
	}
}
?>

