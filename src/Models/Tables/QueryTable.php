<?php

namespace Models\Tables;


/**
 *  Les requêtes sql
 */
class QueryTable implements QueryTableInterface {
    

    /**
     * Les colonnes à afficher dans la requêtes 
     *
     * @var array
     */
    private $fields = [];


    public function select(string ...$fields): QueryTableInterface
    {
        return $this;
    }
}