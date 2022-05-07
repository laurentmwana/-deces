<?php

namespace App\Modules;

use App\Modules\Module;
use App\Renderer\Renderer;
use App\Routes\Router;

class DefaultsModule extends Module {
    
    public function __construct(Router $route, Renderer $renderer)
    {
        parent::__construct($route, $renderer);

        $this->route
        ->get("/", [$this, "welcome"], "defaults.index");
    }


     /**
     * Page d'accueil du blog 
     * 
     * @return mixed
     */
    public function welcome () {
        $this->renderer
        ->render("defaults@index");
    }
}