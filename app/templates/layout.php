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
		<ul>
			<li><a href="<?=BASE_URL?>" title="">Home</a></li>
			<li><a href="<?=BASE_URL?>user/watchlist" title="">Watchlist</a></li>
			<li><a href="<?=BASE_URL?>admin" title="">Admin</a></li>
		</ul>
	</nav>
<main class="container">
	<h1><?= $title ?></h1>
	<article>
	<?php include("app/templates/$page.php"); //le contenu ?>
	</article>
</main>

<footer class="container">
	<nav class="nav nav-tabs nav-justified" role="tablist">
		<ul>
			<li><a href="<?=BASE_URL?>" title="">Home</a></li>
			<li><a href="<?=BASE_URL?>user/watchlist" title="">Watchlist</a></li>
			<li><a href="<?=BASE_URL?>admin" title="">Admin</a></li>
		</ul>
	</nav>
</footer>
</body>
</html>