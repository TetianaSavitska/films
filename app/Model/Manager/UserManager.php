<?php

namespace Model\Manager;

use Model\Db;
use Model\Entity\User;

class UserManager
{
	//insert
	public function insert(User $user)
	{
		$sql = "INSERT INTO users(username, password, email, role, token, dateRegistered) 
				VALUES (:username, :password, :email, :role, :token, NOW());";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":username", $user->getUsername());
		$stmt->bindValue(":password", $user->getPassword());
		$stmt->bindValue(":email", $user->getEmail());
		$stmt->bindValue(":role", $user->getRole());		
		$stmt->bindValue(":token", $user->getToken());	
			
		return $stmt->execute();
	}

	public function findUser($usernameOrEmail)
	{
		$sql = "SELECT * FROM users 
				WHERE username = :usernameOrEmail 
				OR email = :usernameOrEmail";

		$dbh = Db::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":usernameOrEmail", $usernameOrEmail);
		$stmt->execute();
		$user = $stmt->fetchObject('\Model\Entity\User');
		
		return $user;
	}

	/*//delete
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
	}*/

	public function findOneById($id){
		$sql = "SELECT *
				FROM users WHERE id = :id";
		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		$result = $stmt->fetchObject('\Model\Entity\User');

		return $result;
	}

	public function findAll()
	{
		$sql = "SELECT *
				FROM users";
		$dbh = Db::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS, '\Model\Entity\User');

		return $results;
	}

}

?>