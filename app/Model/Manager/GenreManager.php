<?php

namespace Model\Manager;

use Model\Db;
use PDO;

class GenreManager
{
	public function findAll(){
		$sql = "SELECT *  
				FROM genres";
		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Genre');

		return $results;
	}
}
?>