<?php

namespace App\Models\Tables;

use App\Models\Entity\CategoryEntity;

class categorieTable extends Table {


    protected $table = "category";

    protected $entity =  CategoryEntity::class;

}