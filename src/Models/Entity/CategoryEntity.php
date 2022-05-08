<?php


namespace App\Models\Entity;

use DateTime;

class categoryEntity {

    private $id;

    private $categorie;

    private $type;

    private $content;

    private $dateCreate;

    private $dateUpdate;

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  void
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  void
     */ 
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  void
     */ 
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get the value of dateCreate
     */ 
    public function getDateCreate(): DateTime
    {
        return new DateTime($this->dateCreate);
  
    }

    /**
     * Set the value of dateCreate
     *
     * @return  void
     */ 
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }

    /**
     * Get the value of dateUpdate
     */ 
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * Set the value of dateUpdate
     *
     * @return  void
     */ 
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  void
     */ 
    public function setId($id): void
    {
        $this->id = $id;
    }
}