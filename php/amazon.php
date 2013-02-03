<?php
header('Access-Control-Allow-Origin: *');  


$expire=60*60*24*1;// seconds, minutes, hours, days
header('Pragma: public');
header('Cache-Control: maxage='.$expire);
header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expire) . ' GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');


header('Content-type: application/json');

class XmlToJson {

	public function Parse ($fileContents) {

		$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);

		$fileContents = trim(str_replace('"', "'", $fileContents));

		$simpleXml = simplexml_load_string($fileContents);

		$json = json_encode($simpleXml);

		return $json;

	}

}

$ret = array();

$terms = explode(",", $_GET["terms"]);
foreach($terms as $term){
	$a = json_decode(amazon($term), true);
	if($a && $a["Items"] && $a["Items"]["Item"]){
		$us = $a["Items"]["Item"];
		$ret[$term] = $us;
	}
}

echo json_encode($ret);

function amazon($t){

	$AWS_ACCESS_KEY_ID = "AKIAJ3VHRV6JT67WLIMQ";
	$AWS_SECRET_ACCESS_KEY = "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";

	$base_url = "http://ecs.amazonaws.com/onca/xml?";
	$url_params = array('Operation'=>"ItemSearch",'Service'=>"AWSECommerceService",
	 'AWSAccessKeyId'=>$AWS_ACCESS_KEY_ID,'AssociateTag'=>"mytag-20",
	 'SearchIndex'=>"All",
	 'Keywords'=>trim(urlencode($t)));

	// Add the Timestamp
	$url_params['Timestamp'] = gmdate("Y-m-d\TH:i:s.\\0\\0\\0\\Z", time());

	// Sort the URL parameters
	$url_parts = array();
	foreach(array_keys($url_params) as $key)
	    $url_parts[] = $key."=".$url_params[$key];
	sort($url_parts);

	// Construct the string to sign
	$string_to_sign = "GET\necs.amazonaws.com\n/onca/xml\n".implode("&",$url_parts);
	$string_to_sign = str_replace('+','%20',$string_to_sign);
	$string_to_sign = str_replace(':','%3A',$string_to_sign);
	$string_to_sign = str_replace(';',urlencode(';'),$string_to_sign);

	// Sign the request
	$signature = hash_hmac("sha256",$string_to_sign,$AWS_SECRET_ACCESS_KEY,TRUE);

	// Base64 encode the signature and make it URL safe
	$signature = base64_encode($signature);
	$signature = str_replace('+','%2B',$signature);
	$signature = str_replace('=','%3D',$signature);

	$url_string = implode("&",$url_parts);
	$url = $base_url.$url_string."&Signature=".$signature;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

	$xml_response = curl_exec($ch);

	$json_response = XmlToJson::Parse($xml_response);

	return $json_response;
}
?>