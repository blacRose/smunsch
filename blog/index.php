<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="/js/custom.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/github-markdown.css">
	<link rel="stylesheet" type="text/css" href="/css/default.css">
	<link href="//fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<meta charset="utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale = 1.0, user-scalable=no">
	<meta property="og:title" content="<?php require "title.php"; ?>" />
	<meta property="fb:app_id" content="337344259989920" />
	<meta property="og:image" content="https://smuns.ch/img/<?php echo require "image.php"; ?>.png" />
	<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" />
	<title><?php require "title.php"; ?></title>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '337344259989920',
				xfbml      : true,
				version    : 'v2.7'
			});
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
</head>
<body class="markdown-body<?php
echo (!isset($_REQUEST['p'])?' blogpage': ' ');
echo require "image.php";
?>">

<?php if (isset($_REQUEST['p'])) :
	require_once "posts.php";
else : ?>
<br><p class="check" style="text-align: center">My title <em>shows</em> the post.</p>
<ul id="postlist">

<?php require_once "getpost.php"; ?>

</ul>

<?php endif; ?>
</body>
</html>
