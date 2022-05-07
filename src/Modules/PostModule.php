<?php

namespace App\Modules;

use App\Modules\Module;
use App\Renderer\Renderer;
use App\Routes\Router;

class PostModule extends Module {
    
    public function __construct(Router $route, Renderer $renderer)
    {
        parent::__construct($route, $renderer);

        $this->route
        ->get("/post", [$this, "post"], "post.index");
    }


     /**
     * Page d'accueil des articles 
     * 
     * @return mixed
     */
    public function post () {
        $this->renderer
        ->render("posts@index");
    }
}