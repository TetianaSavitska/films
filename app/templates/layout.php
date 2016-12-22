<!DOCTYPE html>
<htm lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/css/style.css">
</head>
<body>
<nav class="nav nav-tabs nav-justified" role="tablist">
		<ul class="container">
			<li><a href="<?=BASE_URL?>" title="">Home</a></li>
			<li><a href="<?=BASE_URL?>user/watchlist" title="">Watchlist</a></li>
			<li><a href="<?=BASE_URL?>admin" title="">Admin</a></li>
			<li><span class="icons"><i class="material-icons">person</i></span></li>
		</ul>
</nav>
<main class="container">
	<article class="main-article">
		<h1 class="title"><?= $title ?></h1>
		<?php include("app/templates/$page.php"); //le contenu ?>
	</article>
</main>

<footer>
	<nav class="nav nav-tabs nav-justified" role="tablist">
		<ul class="container">
			<li><a href="<?=BASE_URL?>" title="">Home</a></li>
			<li><a href="<?=BASE_URL?>user/watchlist" title="">Watchlist</a></li>
			<li><a href="<?=BASE_URL?>admin" title="">Admin</a></li>
		</ul>
	</nav>
</footer>
</body>
</html>