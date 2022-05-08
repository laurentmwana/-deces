<?php

namespace App\Modules;

use App\Modules\Module;
use App\Renderer\Renderer;
use App\Routes\Router;
use App\Models\Tables\categorieTable;

class CategorieModule extends Module {
    
    /**
     * CategorieModule Constructor 
     *
     * @param Router $route
     * @param Renderer $renderer
     */
    public function __construct(Router $route, Renderer $renderer)
    {
        parent::__construct($route, $renderer);

        $this->route
            ->get("/categorie/show/:id", [$this, "show"], "categorie.show")
            ->get("/categorie", [$this, "categorie"], "categorie.index");
    }


     /**
     * Page d'accueil des categories 
     * 
     * @return mixed
     */
    public function categorie () {

        $categories = (new categorieTable())->all();
        
        return $this->renderer
        ->render("categories@index", compact('categories'));
    }

    public function show ($id) {
        
        $categorie = (new categorieTable())->bind($id)[0];
        
        return $this->renderer
        ->render("categories@show", compact("categorie"));
    }
}