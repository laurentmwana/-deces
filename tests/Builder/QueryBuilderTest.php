<?php

use App\Models\Builder\Builder;
use App\Models\Builder\QueryBuilder;
use App\Models\Connection;
use App\Models\Entity\CategoryEntity;
use App\Models\Tables\categorieTable;
use PHPUnit\Framework\TestCase;


class QueryBuilderTest extends TestCase {

    public function testSelectWherePrepareParams () {

        $builder = new QueryBuilder();

        $query = $builder
            ->from("category")
            ->where("id = :id")
        ->toSql();

        $build = new Builder(Connection::getPDO());
        $build->setClassMapping(CategoryEntity::class);
        $data = $build->setParams([":id" => 1])->prepareArray($query)[0];

        $this->assertInstanceOf(CategoryEntity::class, $data);
    }

    
    public function testSelectWherePrepareParamsCount () {

        $builder = new QueryBuilder();

        $query = $builder
            ->from("category")
            ->where("id = :id")
        ->toSql();

        $build = new Builder(Connection::getPDO());
        $build->setClassMapping(CategoryEntity::class);
        $data = $build->setParams([":id" => 1])->prepareArray($query);

        $this->assertEquals(1, count($data));
    }

    public function testSelectAllWhereQuery () {

        $builder = new QueryBuilder();

        $query = $builder
            ->from("category")
            ->where("id > 10", "name = peta")->toSql();

        $this->assertEquals($query, "SELECT * FROM category WHERE (id > 10) AND (name = peta)");
    }

    public function testSelectAllQuery () {

        $builder = new QueryBuilder();

        $query = $builder
            ->from("category")->toSql();

        $this->assertEquals($query, "SELECT * FROM category");
    }


    public function testSelectFieldsQuery () {

        $builder = new QueryBuilder();

        $query = $builder
            ->from("category")->fields("name", "categorie")->toSql();

        $this->assertEquals($query, "SELECT name, categorie FROM category");
    }

    public function testSelectAllDatabase () {

        $builder = new QueryBuilder();

        $query = $builder
            ->from("category")->toSql();
        $queries = (new Builder(Connection::getPDO()));
        $queries->setClassMapping(CategoryEntity::class);
        $data =  $queries->query($query);

        $this->assertEquals(10, count($data));
    }


    public function testSelectInstanceOfEntityDatabase () {

        $builder = new QueryBuilder();

        $query = $builder
            ->from("category")->toSql();
        $queries = (new Builder(Connection::getPDO()));
        $queries->setClassMapping(CategoryEntity::class);
        $data =  $queries->query($query)[0];

        $this->assertInstanceOf(CategoryEntity::class, $data);
    }
}