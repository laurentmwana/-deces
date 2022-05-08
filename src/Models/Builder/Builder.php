<?php


namespace App\Models\Builder;

use App\Models\Connection;
use PDO;
use phpDocumentor\Reflection\Types\Void_;

class Builder{

    private PDO $pdo;
    
    private $classMapping;

    private $params = [];

    /**
     * Constructor Builder
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;

        if (is_null($this->pdo)) {
            throw new BuilderException("Impossible de récupèrer l'instance de PDO, Un problème est survenu au niveau de la base de données ");
        }
    }


    public  function prepare ($statement) {
        return $this->pdo->prepare($statement)->execute($this->getParams());
    }

    public  function query ($statement) {
        return $this->pdo->query($statement)->fetchAll(PDO::FETCH_CLASS, $this->getClassMapping());
    }

    public  function prepareArray ($statement) {
        $query = $this->pdo->prepare($statement);
        $query->execute($this->getParams());

        return $query->fetchAll(PDO::FETCH_CLASS, $this->getClassMapping());

    }

    /**
     * Get the value of classMapping
     */ 
    public function getClassMapping()
    {
        return $this->classMapping;
    }

    /**
     * Set the value of classMapping
     *
     * @return  self
     */ 
    public function setClassMapping($classMapping): self
    {
        $this->classMapping = $classMapping;

        return $this;
    }


    /**
     * Get the value of params
     */ 
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Set the value of params
     *
     * @return  self
     */ 
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }
}