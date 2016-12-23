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
			<?php if (!empty($_SESSION['user'])): ?>
				<li><a href="<?=BASE_URL?>user/watchlist" title="">Watchlist</a></li>
				<?php if ($_SESSION['user']->getRole() == "admin"): ?>
					<li><a href="<?=BASE_URL?>admin" title="">Admin</a></li>
				<?php endif; ?>
				<li><a href="<?=BASE_URL?>logout">Logout</a></li>
			<?php else: ?>
				<li><a href="<?=BASE_URL?>subscribe"><span class="icons">Sign up</a></li>
				<li><a href="<?=BASE_URL?>login"><span class="icons">Login<i class="material-icons">person</i></span></a></li>
			<?php endif; ?>
		</ul>
</nav>
<main class="container">
	<article class="main-article">
		<h1 class="title"><?= $title ?></h1>
		<p>
		<?php if (!empty($_SESSION['user'])): ?>
			You are loged in as <?= ucfirst( $_SESSION['user']->getUsername() )?>
		<?php endif; ?>
		</p>
		<?php include("app/templates/$page.php"); //le contenu ?>
	</article>
</main>

<footer>
	<nav class="nav nav-tabs nav-justified" role="tablist">
		<ul class="container">
			<li>IMIE 2016 &copy;T.Savitska </li>
		</ul>
	</nav>
</footer>
</body>
</html>