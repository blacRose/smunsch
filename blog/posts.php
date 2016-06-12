<?php
require_once 'MD/Markdown.inc.php';
use \Michelf\Markdown;
$url = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$text = str_replace("/","",parse_url($url, PHP_URL_PATH));
if ($text == "blog") {
	$text = $_REQUEST['p'];
}
if (preg_match('/^\d*$/', $text) && $text != "") {
	$text = './' . $text . '.md';
	$fileop = $text;
} else {
	$directory = "./";
	$texts = glob($directory . "*.md");
	foreach($texts as $key => $texta)
	{
		$my_file = fopen($texta, "r") or die("Unable to open file!");
		$title = preg_replace("/[^a-zA-Z0-9\s]/", "", strtolower(str_replace("# ", "", fgets($my_file))));
		$title = substr($title, 0, -1);
		fclose($my_file);
		if (str_replace(" ", "", $title) == $text || str_replace(" ", "-", $title) == $text) {
			$fileop = $texta;
		}
	}
}
if (!isset($fileop)) {
	echo "<div style='position: absolute; top: 50%; width: 80%;'><h1 style='border-bottom-width:0px;margin:0;padding:0;'>404!</h1></div>";
	die;
}
$my_file = fopen($fileop, "r") or die("Unable to open file!");
$my_text = fread($my_file,filesize($fileop));
fclose($my_file);
echo "<span class='visible postcont'>";
$my_html = Markdown::defaultTransform($my_text);
echo $my_html;
echo "</span>";
?>
