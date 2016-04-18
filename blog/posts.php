<?php
require_once 'MD/Markdown.inc.php';
use \Michelf\Markdown;
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$text = str_replace("/","",parse_url($url, PHP_URL_PATH));
$text = './' . $text . '.md';
$my_file = fopen($text, "r") or die("Unable to open file!");
$my_text = fread($my_file,filesize($text));
fclose($my_file);
echo "<span class='visible postcont'>";
$my_html = Markdown::defaultTransform($my_text);
echo $my_html;
echo "</span>";
?>
