<?php
$url = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$text = str_replace("/","",parse_url($url, PHP_URL_PATH));
$text = preg_replace("/[\-\s\[\]\\|\+]/","",$text);
if (preg_match('/^\d*$/', $text) && $text != "") {
	$search  = array('1','2','3','4','5','6','7','8','9','0');
	$replace = array('q','w','e','r','t','y','u','i','o','p');
	$text = str_replace($search,$replace,$text);
} else {
	$search  = array('1','2','3','4','5','6','7','8','9','0');
	$replace = array('i','z','e','a','s','b','t','b','p','o');
	$text = str_replace($search,$replace,$text);
}
$text = strtolower($text);
return $text;
?>
