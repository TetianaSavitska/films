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
		$currentPage = ( empty($_GET['page']) ) ? 1 : $_GET['page'];

		//show all movies sorted by rating
		$movieManager = new \Model\Manager\MovieManager();
		$movies = $movieManager->findAll( $currentPage );
		$count = $movieManager->countAll();
		$numPerPage = $movieManager->numPerPage();

		//get years from DB
		$moviesYears = $movieManager->findYears();

		//get genres from DB
		$genreManager = new \Model\Manager\GenreManager();
		$genres = $genreManager->findAll();
		
		if( !empty($_POST) ){
			if( isset($_POST['keyWord']) ){
			    //search by keyword
				$word = $_POST['keyWord'];
				$movies = $movieManager->findByKeyWord($word, $currentPage );
				$count = $movieManager->countByKeyWord($word);
			}elseif( isset($_POST['year']) ){
			    //search by a year
				$year = $_POST['year'];
				$movies = $movieManager->findByYear($year, $currentPage);
				$count = $movieManager->countByYear($year);
			}elseif( isset($_POST['genre']) ){
			    //search by genre
				$genre = $_POST['genre'];
				$movies = $movieManager->findByGenre($genre, $currentPage);
				$count = $movieManager->countByGenre($genre);
			}else{
				$movies = null;
			}
		}

		View::show("home.php", "Movie Rating", ['movies' => $movies, 
												'moviesCount' => $count,
												'currentPage' => $currentPage,
												'numPerPage' => $numPerPage,
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

	public function register()
	{
		$error = null;
		$user = null;

		//traitement du formulaire d'inscription
		require('vendor/autoload.php');

		if (!empty($_POST)){
			$username = strip_tags($_POST['username']);
			$email = strip_tags($_POST['email']);
			$password = $_POST['password'];
			$bisPassword = $_POST['password_bis'];

			if ( $password != $bisPassword ){
				$error = "The passwords do not match";
			}else{
				//bcrypt
				$passwordHash = password_hash($password, PASSWORD_DEFAULT);

				$role = 'user';

				$factory = new \RandomLib\Factory;
				$generator = $factory->getGenerator(new \SecurityLib\Strength(\SecurityLib\Strength::MEDIUM));
				$token = $generator->generateString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

				$user = new \Model\Entity\User();
				$user->setUsername($username);
				$user->setEmail($email);
				$user->setPassword($passwordHash);
				$user->setRole($role);
				$user->setToken($token);

				//verify the data and store in the user
				if ( $user->isValid() ){
					$userManager = new \Model\Manager\UserManager();
					//appelle le UserManager pour requetes SQL
					$userManager->insert($user);
					//redirige sur l'accueil
					View::show("connection.php", "Log in" , ['user' => $user]);
				}else{
					$errors= $user->getErrors();
					$error = $errors[0];
				}
			}
		}
		View::show("inscription.php", "Sign up", ['user' => $user,
												  'error' => $error ] );
	}

	public function login()
	{
		session_start();
		$error=null;
		//traitement du fformulaire de connection

		//si le form est soumis...
		if (!empty($_POST)){

			$usernameOrEmail = $_POST['usernameOrEmail'];
			//on va chercher le user en fonction du pseudo ou de l'email
			$userManager = new \Model\Manager\UserManager();
			$user = $userManager->findUser($usernameOrEmail);

			//hache le mot de passe et le compare à celui de la bdd
			if ( password_verify( $_POST['password'], $user->getPassword() ) ){
				//connectez l'user en stockant une ou des infos dans la session. On vérifiera ces infos sur les pages à sécuriser.
				$_SESSION['user'] = $user;

				//$_COOKIE pour la lecture
				//on stocke le token dans un cookie
				//on ne devrait placer ce cookie que si une case est cochée
				//pour l'instant, ce cookie ne sert à rien !!!
				setcookie("remember_me", $user->getToken(), strtotime("+ 6 months"), "/");
				header("Location: ". BASE_URL);
			}
			else {
				//on garde ça vague pour ne pas donner d'infos aux méchants
				$error = "Not valid username or password!";
			}

		}
		//appelle le UserManager pour requetes URL
		View::show("connection.php", "Log in", ['error' => $error]);
	}

	public function logout()
	{
		//deconnection 
		//redirection
		View::show("deconnection.php", "Log out");
	}

	public function watchlist()
	{
		$movieManager = new \Model\Manager\MovieManager();
		$movies= $movieManager->findAll( 1 );
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

