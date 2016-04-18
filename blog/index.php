<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="/js/custom.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/github-markdown.css">
	<link rel="stylesheet" type="text/css" href="/css/default.css">
	<meta charset="utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale = 1.0, user-scalable=no">
</head>
<body class="markdown-body blogpage">

<?php
if (isset($_REQUEST['p'])) :
	require_once "posts.php";
else : ?>

<ul id="postlist">

<?php
require_once "getpost.php";
?>

</ul>

<?php endif; ?>
</body>
</html>
