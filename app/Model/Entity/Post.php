<?php 

namespace Model\Entity;

class Post
{
	private $id;
	private $title;
	private $content;
	private $image;
	private $dateCreated;

	private $validationErrors = [];

	public function isValid()
	{
		$isValid = true;

		$this->setTitle( htmlentities( $this->getTitle() ) );
		$this->setContent(htmlentities( $this->getContent() ));

		if( empty($this->title) ){
			$isValid = false;
			$this->validationErrors[] = "Veuillez renseigner un titre !";
		}

		if( strlen($this->title) > 255 ){
			$isValid = false;
			$this->validationErrors[] = "Votre titre est trop long !";
		}

		if( empty($this->content) ){
			$isValid = false;
			$this->validationErrors[] = "Veuillez renseigner un contenu!";
		}

		if( strlen($this->content) < 10 ){
			$isValid = false;
			$this->validationErrors[] = "Votre contenu est trop court !";
		}


		return $isValid;
	}

	public function getValidationErrors()
	{
		return $this->validationErrors;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $content
     */
    public function setImage($img)
    {
        $this->image = $img;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

	
}

?>