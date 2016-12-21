<?php

namespace Controller;

use View\View; //on peut donc utiliser cette classe comme View au lieu de \View\View

class DefaultController 
{
	/**
	 * Affiche la page d'accueil
	 */
	public function home()
	{
		//show all sorted by rating
		$movieManager = new \Model\Manager\MovieManager();
		$movies = $movieManager->findAll();

		//search by keyword
		$moviesByKeyWord = null;
		if( !empty($_POST) && isset($_POST['keyWord']) ){
			$word = $_POST['keyWord'];
			$moviesByKeyWord = $movieManager->findByKeyWord($word);
		}

		//search by a year
		$moviesYears = $movieManager->findYears();
		$moviesByYear = null;
		if( !empty($_POST) && isset($_POST['year'])){
			$year = $_POST['year'];
			$moviesByYear = $movieManager->findByYear($year);
		}
		
		//search by genre
		$genreManager = new \Model\Manager\GenreManager();
		$genres = $genreManager->findAll();
		$moviesByGenre = null;
		if( !empty($_POST) && isset($_POST['genre'])){
			$genre = $_POST['genre'];
			$moviesByGenre = $movieManager->findByGenre($genre);
		}

		View::show("home.php", "Movie Rating", ['movies' => $movies, 
												'moviesByKeyWord' => $moviesByKeyWord,
												'moviesByYear' => $moviesByYear, 
												'moviesYears' => $moviesYears,
												'moviesByGenre' => $moviesByGenre, 
												'genres' => $genres]);
	}

	public function movieDetails()
	{
		$movieManager = new \Model\Manager\MovieManager();
		$id = $_GET['id'];
		$movie = $movieManager->findOneById($id);
		if( empty($movie) ){
			return $this->error404();
		}
		View::show("movieDetails.php", $movie -> getTitle() , ['movie' => $movie]);
	}

	public function watchlist()
	{
		$movieManager = new \Model\Manager\MovieManager();
		$movies= $movieManager->findAll();
		View::show("watchlist.php", "My watchlist" , ['movies' => $movies]);
	}

	public function adminHome()
	{
		$movieManager = new \Model\Manager\MovieManager();
		$movies= $movieManager->findAll();
		View::show("adminHome.php", "Admin" , ['movies' => $movies]);
	}


	/**
	 * Affiche la page d'erreur 404
	 */
	public function error404()
	{
		//envoie une entête 404 (pour notifier les clients que ça a foiré)
		header("HTTP/1.0 404 Not Found");
		View::show("errors/404.php", "Oups ! Perdu ?");
	}
}

