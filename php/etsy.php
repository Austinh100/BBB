<?php

header('Access-Control-Allow-Origin: *');  
header('Content-type: application/json');



$user = $_GET["user"];

// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://openapi.etsy.com/v2/users/'.$user.'?api_key=4hysmxelcygo4kizxsgpfg2b',
    CURLOPT_USERAGENT => 'GiftShit'
));
// Send the request & save response to $resp
$resp = json_decode(curl_exec($curl), true);



$userID = $resp["results"][0]["user_id"];



$curl2 = curl_init();
curl_setopt_array($curl2, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://openapi.etsy.com/v2/users/'.$userID.'/favorites/listings?api_key=4hysmxelcygo4kizxsgpfg2b',
    CURLOPT_USERAGENT => 'GiftShit'
));
$resp2 = json_decode(curl_exec($curl2), true);

$other = array();

foreach($resp2["results"] as $rez){
	$curl3 = curl_init();
	curl_setopt_array($curl3, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => 'https://openapi.etsy.com/v2/listings/'.$rez["listing_id"].'?api_key=4hysmxelcygo4kizxsgpfg2b',
	    CURLOPT_USERAGENT => 'GiftShit'
	));
	$resp3 = json_decode(curl_exec($curl3), true);
	array_push($other, $resp3["results"][0]);
}

echo json_encode($other);

// Close request to clear up some resources
curl_close($curl);

?>