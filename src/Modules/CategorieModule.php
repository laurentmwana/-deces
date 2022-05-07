<?php

namespace App\Modules;

use App\Modules\Module;
use App\Renderer\Renderer;
use App\Routes\Router;

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
        ->get("/categorie", [$this, "categorie"], "categorie.index");
    }


     /**
     * Page d'accueil des categories 
     * 
     * @return mixed
     */
    public function categorie () {
        $this->renderer
        ->render("categories@index");
    }
}