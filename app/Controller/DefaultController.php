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
		//show all movies sorted by rating
		$movieManager = new \Model\Manager\MovieManager();
		$movies = $movieManager->findAll();
		//get years from DB
		$moviesYears = $movieManager->findYears();
		//get genres from DB
		$genreManager = new \Model\Manager\GenreManager();
		$genres = $genreManager->findAll();
		
		if( !empty($_POST) ){
			if( isset($_POST['keyWord']) ){
			    //search by keyword
				$word = $_POST['keyWord'];
				$movies = $movieManager->findByKeyWord($word);
			}elseif( isset($_POST['year']) ){
			    //search by a year
				$year = $_POST['year'];
				$movies = $movieManager->findByYear($year);
			}elseif( isset($_POST['genre']) ){
			    //search by genre
				$genre = $_POST['genre'];
				$movies = $movieManager->findByGenre($genre);
			}else{
				$movies = null;
			}
		}

		View::show("home.php", "Movie Rating", ['movies' => $movies, 
												'moviesYears' => $moviesYears,
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

