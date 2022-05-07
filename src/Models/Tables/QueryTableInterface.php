<?php

namespace Models\Tables;


interface QueryTableInterface {
    
    /**
     * permet de selectionner les informations depuis la base de données 
     *
     * @param string ...$fields
     * @return self
     */
    public function select (string ...$fields): self;
}