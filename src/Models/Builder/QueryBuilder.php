<?php

namespace App\Models\Builder;

use PDO;

class QueryBuilder{

    private array $fields = [];

    private ?string $from = null;

    private array $where = [];

    private $entity;

    /**
     * Spécifie les champs à selectionner 
     *
     * @param  ...$fields
     * @return self
     */
    public function fields (...$fields): self {

        $this->fields = array_merge($this->fields, $fields);

        return $this;
    }


    /**
     * Spécifie la table 
     *
     * @param String $from
     * @param string|null $alias
     * @return self
     */
    public function from (String $from, ?string $alias = null): self {

        if ($alias) {
           $this->from = $from . " as " . $alias;

        } else {
            $this->from = $from;
        }
        return $this;
    }


    public function toSql () {

        $query = ["SELECT"];
        $query[] = empty($this->fields) ?  "*" : join(", ", $this->fields);
        
        if (empty($this->from) || $this->from ===  null) {
            throw new BuilderException("Le nom de la table n'est pas définie, veuillez le définir puis réessayer ");
        }
        $query[] = "FROM";
        $query[] = $this->from;


        if (!empty($this->where)) {
            $query[] = "WHERE";
            $query[] =  "(" . join(") AND (", $this->where) . ")";
        }

        return join(" ", $query);
    }


    /**
     *
     * @param string ...$where
     * @return self
     */
    public function where (string ...$where): self {
        $this->where = $where;

        return $this;
    }
}