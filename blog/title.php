<?php
$url = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$text = str_replace("/","",parse_url($url, PHP_URL_PATH));
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
