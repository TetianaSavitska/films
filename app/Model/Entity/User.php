<?php 

namespace Model\Entity;

use Model\Db;

class User
{
	private $id;
	private $username;
	private $password;
	private $email;
	private $role;
    private $token;
    private $dateRegistered;
    private $watchlist = [];

	private $errors = [];

	public function isValid()
	{
        $isValid = true;
		$this->setUsername( htmlentities( $this->getUsername() ) );
		$this->setPassword(htmlentities( $this->getPassword() ));

		if( empty($this->username) ){
			$this->errors[] = "Please enter a username!";
            $isValid = false;
		}

		if( empty($this->password) ){
			$this->errors[] = "Please enter your password!";
            $isValid = false;
		}

		if( strlen($this->password) > 255 ){
			$this->errors[] = "Your password is too long!";
            $isValid = false;
		}

        if( empty($this->email) ){
            $this->errors[] = "Please enter your email!";
            $isValid = false;
        }

        //email avec filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->errors[] = "Your email is not valid!";
            $isValid = false;
        }

        //vérifie que l'email n'existe pas déjà 
        $sql = "SELECT id FROM users WHERE email = :email";
        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":email", $this->email);
        $stmt->execute();
        if ($stmt->fetch()){
            $this->errors[] = "This email already exists!";
            $isValid = false;
        }

        //vérifie que le username n'existe pas déjà 
        $sql = "SELECT id FROM users WHERE username = :username";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":username", $this->username);
        $stmt->execute();
        if ($stmt->fetch()){
            $this->errors[] = "This username already exists!";
            $isValid = false;
        }

		return $isValid;
	}

	public function getErrors()
	{
		return $this->errors;
	}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getDateRegistered()
    {
        return $this->dateRegistered;
    }

    /**
     * @param mixed $dateRegistered
     */
    public function setDateRegistered($dateRegistered)
    {
        $this->dateRegistred = $dateRegistered;
    }

    public function getWatchlist()
    {
        return $this->watchlist;
    }

    public function setWatchlist($watchlist)
    {
        $this->watchlist = $watchlist;
    }
	
}

?>