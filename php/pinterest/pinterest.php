<?php

header('Access-Control-Allow-Origin: *');  


$expire=60*60*24*1;// seconds, minutes, hours, days
header('Pragma: public');
header('Cache-Control: maxage='.$expire);
header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expire) . ' GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');


header('Content-type: application/json');




include_once "dom.php";

function pinterest($user){
	// Create DOM from URL or file
	$html = file_get_html('http://www.pinterest.com/'.$user);
	
	$boards = array();
	
	// Find all links (we'll parse these into boards)
	foreach($html->find('.board > a') as $element){
		$href = $element->href;
		$pieces = explode("/", $href);
		if($pieces[1] == $user){
			array_push($boards, str_replace("-", " ", $pieces[2]));
		}
	}
	return $boards;
}

$usr = $_GET["user"];

echo json_encode(pinterest($usr));

?>