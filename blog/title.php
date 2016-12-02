<?php
$url = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$text = str_replace("/","",parse_url($url, PHP_URL_PATH));
$text = preg_replace("/[\-\s\[\]\\|\+]/","",$text);
$text = strtolower($text);
if (preg_match('/^\d*$/', $text) && $text != "") {

} else {
	$search  = array('1','2','3','4','5','6','7','8','9','0');
	$replace = array('i','z','e','a','s','b','t','b','p','o');
	$text = str_replace($search,$replace,$text);
}
if ($text == "blog") {
	echo "Blog";
	return;
}
if (preg_match('/^\d*$/', $text) && $text != "") {
	$text = './' . $text . '.md';
	$fileop = $text;
	$my_file = fopen($text, "r") or die("Unable to open file!");
	$title = preg_replace("/[^a-zA-Z0-9\s]/", "", str_replace("# ", "", fgets($my_file)));
	$title = substr($title, 0, -1);
	fclose($my_file);
	echo $title;
} else {
	$directory = "./";
	$texts = glob($directory . "*.md");
	foreach($texts as $key => $texta)
	{
		$my_file = fopen($texta, "r") or die("Unable to open file!");
		$title = preg_replace("/[^a-zA-Z0-9\s]/", "", str_replace("# ", "", fgets($my_file)));
		$title = substr($title, 0, -1);
		$text = preg_replace("/[\-\[\]\\|\+]/","",$text);
		$title = preg_replace("/[\-\[\]\\|\+]/","",$title);
		fclose($my_file);
		if (str_replace(" ", "", strtolower($title)) == $text || str_replace(" ", "-", strtolower($title)) == $text) {
			$fileop = $title;
		}
	}
	if (isset($fileop)) {
		echo $fileop;
	} else {
		echo "404 - Page Not Found";
	}
}
?>
