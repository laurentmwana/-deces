<?php


namespace App\Models\Tables;

use App\Models\Builder\Builder;
use App\Models\Builder\QueryBuilder;
use App\Models\Connection;
use PDO;

class Table {

    private PDO $pdo;

    protected $table;

    protected $entity;

    private Builder $builder;

    private QueryBuilder $query;

    /**
     * Constructor Table
     */
    public function  __construct () {
        $this->pdo = Connection::getPDO();

        if (is_null($this->entity)) {
           throw new TableException("La proprieté entity ne doit pas être nulle ");
        }

        if (is_null($this->table)) {
            throw new TableException("La proprieté table ne doit pas être nulle ");
        }

        $this->builder = new Builder($this->pdo);
        $this->query = new QueryBuilder;

    }

    public function bind ($key, $regex = "(^[0-9]+$)"): array {

        
        if (preg_match($regex, $key) === false) {
            throw new TableException("#$key n'est pas valide");
        }

        $query = $this->query
            ->from($this->table)
            ->where("id = :id")
        ->toSql();

        $data = $this->builder
            ->setClassMapping($this->entity)
            ->setParams([":id" => $key])
            ->prepareArray($query);

        if ($data == false) {
            throw new TableException("#$key fournie n'existe pas");
        }

        return $data;
    }


    /**
     * Selectionne tous dans la base de données 
     *
     * @return array
     */
    public function all (): array {
        $query = $this->query
            ->from($this->table)
        ->toSql();

        return $this->builder
            ->setClassMapping($this->entity)
            ->query($query);
    }

    /**
     * Get the value of pdo
     */ 
    protected function getPdo(): PDO
    {
        return $this->pdo;
    }
}