<?php

namespace Model\Manager;

use Model\Db;
use PDO;

/**
 * Contient toutes les méthodes faisant des requêtes à la base de données
 */
class MovieManager
{
	public function numPerPage(){
		return 10;
	}

	public function findAll( $page=null)
	{
		$numPerPage = $this->numPerPage();
		$offset = $numPerPage * ($page -1);
		$sql = "SELECT *
				FROM movies
				ORDER BY rating DESC ";
		if ($page != null){
			$sql.= "LIMIT $numPerPage 
					OFFSET $offset";		
		}

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Movie');

		return $results;
	}

	public function countAll()
	{
		$sql = "SELECT COUNT(*)
				FROM movies";
		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		return $count;
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

	public function findByKeyWord( $word, $page)
	{
		$numPerPage = $this->numPerPage();
		$offset = $numPerPage  * ($page -1);

		$sql = 'SELECT * FROM movies 
				WHERE title LIKE "%":word"%"
				OR year LIKE "%":word"%"
				OR cast LIKE "%":word"%"
				OR directors LIKE "%":word"%"
				OR writers LIKE "%":word"%"
				ORDER BY rating DESC
				LIMIT '. $numPerPage .
				' OFFSET '. $offset;

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":word", $word);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Movie');

		return $results;
	}

	public function countByKeyWord($word)
	{
		$sql = 'SELECT COUNT(*) FROM movies 
				WHERE title LIKE "%":word"%"
				OR year LIKE "%":word"%"
				OR cast LIKE "%":word"%"
				OR directors LIKE "%":word"%"
				OR writers LIKE "%":word"%"';

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":word", $word);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		return $count;
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

	public function findByYear($year, $page )
	{
		$numPerPage = $this->numPerPage();
		$offset = $numPerPage  * ($page -1);

		$sql = "SELECT * FROM movies 
				WHERE year=:year 
				ORDER BY rating DESC
				LIMIT $numPerPage 
				OFFSET $offset";

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":year", $year);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Movie');

		return $results;
	}

	public function countByYear($year)
	{
		$sql = "SELECT COUNT(*) FROM movies 
				WHERE year=:year ";

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":year", $year);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		return $count;
	}

	public function findByGenre($genre, $page)
	{
		$numPerPage = $this->numPerPage();
		$offset = $numPerPage * ($page -1);

		$sql = "SELECT m.id, m.imdbId, m.title, m.year, m.rating, m.votes, g.name 
				FROM movies m
				INNER JOIN movies_genres mg
				ON m.id = mg.movieId
				INNER JOIN genres g
				ON mg.genreId = g.id
				WHERE g.id = :genre
				ORDER BY rating DESC
				LIMIT $numPerPage 
				OFFSET $offset";

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":genre", $genre);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Movie');

		return $results;
	}

	public function countByGenre($genre)
	{
		$sql = "SELECT COUNT(*)
				FROM movies m
				INNER JOIN movies_genres mg
				ON m.id = mg.movieId
				INNER JOIN genres g
				ON mg.genreId = g.id
				WHERE g.id = :genre";

		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":genre", $genre);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		return $count;
	}

	/*//insert
	public function insert(Movie $movie)
	{
		$sql = "INSERT INTO movies(imdbid, title, year, cast, directors, writers, plot, rating, votes, runtime, trailerUrl, dateCreated) 
				VALUES (:imdbid, :title, :year, :cast, :directors, :writers, :plot, :rating, :votes, :runtime, :trailerUrl, NOW());";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":title", $movie->getTitle());
		...
	
			
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
		$sql = "UPDATE movies(imdbid, title, year, cast, directors, writers, plot, rating, votes, runtime, trailerUrl, dateModified) 
				SET (:imdbid, :title, :year, :cast, :directors, :writers, :plot, :rating, :votes, :runtime, :trailerUrl, NOW());";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":title", $movie->getTitle());
		$stmt->bindValue(":plot", $movie->getPlot());
		...
		return $stmt->execute();
	}*/
}

?>