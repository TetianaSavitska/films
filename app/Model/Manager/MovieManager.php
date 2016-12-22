<?php

namespace Model\Manager;

use Model\Db;
use PDO;

/**
 * Contient toutes les méthodes faisant des requêtes à la base de données
 */
class MovieManager
{
//insert
	public function insert(Movie $movie)
	{
		$sql = "INSERT INTO movies(title, content, dateCreated, image) 
				VALUES (:title,:content, NOW(),:image);";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":title", $movie->getTitle());
		$stmt->bindValue(":content", $movie->getContent());
		$stmt->bindValue(":image", $movie->getImage());	
			
		return $stmt->execute();
	}

	//delete
	public function delete($movie)
	{
		$sql = "DELETE FROM movies WHERE id = :id;";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":id", $movie->getId());

		return $stmt->execute();
	}

	//update 
	public function update($movie)
	{
		$sql = "UPDATE movies(imdbid, title, year, cast, directors, writers, plot, rating, votes, runtime, trailerUrl, dateCreated, dateModified) 
				SET (:title,:content, NOW());";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":title", $movie->getTitle());
		$stmt->bindValue(":content", $movie->getContent());
		return $stmt->execute();
	}

	public function findOneById($id){
		$sql = "SELECT *
				FROM movies WHERE id = :id";
		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		$result = $stmt->fetchObject('\Model\Entity\Movie');

		return $result;
	}

	public function findAll()
	{
		$sql = "SELECT *
				FROM movies
				ORDER BY rating DESC";
		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Movie');

		return $results;
	}


	public function findByKeyWord($word)
	{
		$sql = 'SELECT * FROM movies 
				WHERE title LIKE "%":word"%"
				OR year LIKE "%":word"%"
				OR cast LIKE "%":word"%"
				OR directors LIKE "%":word"%"
				OR writers LIKE "%":word"%"
				OR plot LIKE "%":word"%"
				ORDER BY rating DESC';

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":word", $word);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Movie');

		return $results;
	}

	public function findYears(){
		$sql = "SELECT year  
				FROM movies 
				GROUP BY year
				ORDER BY year";
		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Movie');

		return $results;
	}

	public function findByYear($year)
	{
		$sql = 'SELECT * FROM movies 
				WHERE year=:year 
				ORDER BY rating DESC';

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":year", $year);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Movie');

		return $results;
	}

	public function findByGenre($genre)
	{
		$sql = 'SELECT m.id, m.imdbId, m.title, m.year, m.rating, m.votes, g.name 
				FROM movies m
				INNER JOIN movies_genres mg
				ON m.id = mg.movieId
				INNER JOIN genres g
				ON mg.genreId = g.id
				WHERE g.id = :genre
				ORDER BY rating DESC';

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":genre", $genre);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Movie');

		return $results;
	}

}

?>