<?php

namespace App\Modules;

use App\Renderer\Renderer;
use App\Routes\Router;

abstract class Module  {
    /**
     * Une instance de router
     *
     * @var Router
     */
    protected Router $route;

    /**
     * Une instance de Renderer
     *
     * @var Renderer
     */
    protected Renderer $renderer;

    /**
     * Constructor 
     *
     * @param Router $route
     * @param Renderer $renderer
     */
    public function __construct(Router $route, Renderer $renderer)
    {
        $this->route = $route;
        $this->renderer = $renderer;
    }
}