<?php

namespace Model\Manager;

use Model\Db;
use Model\Entity\Post;

class PostManager
{
	//insert
	public function insert(Post $post)
	{
		$sql = "INSERT INTO posts(title, content, dateCreated, image) 
				VALUES (:title,:content, NOW(),:image);";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":title", $post->getTitle());
		$stmt->bindValue(":content", $post->getContent());
		$stmt->bindValue(":image", $post->getImage());	
			
		return $stmt->execute();
	}

	//delete
	public function delete($post)
	{
		$sql = "DELETE FROM posts WHERE id = :id;";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":id", $post->getId());

		return $stmt->execute();
	}

	//update 
	public function update($post)
	{
		$sql = "UPDATE posts(title, content, dateCreated) 
				SET (:title,:content, NOW());";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":title", $post->getTitle());
		$stmt->bindValue(":content", $post->getContent());
		return $stmt->execute();
	}

	public function findOneById($id){
		$sql = "SELECT id, title, content,dateCreated 
				FROM posts WHERE id = :id";
		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		$result = $stmt->fetchObject('\Model\Entity\Post');

		return $result;
	}

	public function findAll()
	{
		$sql = "SELECT id, title, content, dateCreated , image
				FROM posts";
		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\Post');

		return $results;
	}

}

?>