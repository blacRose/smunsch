<?php
require_once 'MD/Markdown.inc.php';
use \Michelf\Markdown;
$directory = "./";
$texts = glob($directory . "*.md");
foreach($texts as $key => $text) {
	$meow = $text;
	$date = str_replace(".md", "", $text);
	echo "<li class='post $key'><a class='title' href='//smuns.ch/$date'>";
	$my_file = fopen($text, "r") or die("Unable to open file!");
	$title = fgets($my_file);
	fclose($my_file);
	$link = str_replace(" ", "-",preg_replace("/[^a-zA-Z0-9\s]/", "", strtolower(str_replace("# ", "", $title))));
	echo "<li class='post $key'><a class='title' href='//smuns.ch/$link'>";
	$text = str_replace(".md", "", $text);
	$text = str_replace("/", "", $text);
	$title = str_replace("# ", "", $title);
	$text = date("D, d M Y", strtotime($text));
	echo "<h1>$title</h1><a class='title' href='//smuns.ch/$date'><p>$text</p></a></a>";
	$text = $meow;
	$my_file = fopen($text, "r") or die("Unable to open file!");
	$my_text = fread($my_file,filesize($text));
	fclose($my_file);
	echo "<span class='postcont'>";
	$my_html = Markdown::defaultTransform($my_text);
	echo $my_html;
	echo "</span>";
	echo "</li>\n";
}
?>
