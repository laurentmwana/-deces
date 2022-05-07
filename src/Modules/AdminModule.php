<?php

namespace App\Modules;

use App\Modules\Module;
use App\Renderer\Renderer;
use App\Routes\Router;

class AdminModule extends Module {
    
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
        ->get("/admin", [$this, "admin"], "admin.index");
    }


     /**
     * Page d'accueil des categories 
     * 
     * @return mixed
     */
    public function admin () {
        $this->renderer
        ->render("admins@index");
    }
}