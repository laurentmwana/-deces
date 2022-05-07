<?php

namespace App\Cores;

use App\Routes\RouteException;
use App\Routes\Router;
use App\Helpers\URI;



 
class App {

    /**
     * Le module charger
     *
     * @var object
     */
    private  $module;

    /**
     *
     * @var array
     */
    private $dependancies = [];

    /**
     * Une instance de router 
     *
     * @var Router
     */
    private  $route;

    /**
     *
     * @var string
     */
    private string $url;



    /**
     * Constructor 
     *
     * @param array $modules
     */
    public function __construct(array $modules, array $dependancies)
    {
        $this->route = new Router($this->getUrl());
        $this->dependancies = $dependancies;

        if (!isset($this->dependancies['renderer'])) {
           throw new AppException("la clé renderer dans le tableau de dependance n'existe pas");
        }

        $this->dependancies['renderer']->setGlobals("route", $this->route);
        foreach ($modules as $module) {
            $this->module[] = new $module($this->route, $this->dependancies['renderer']);
        }
    }


    /**
     * Démarrage de l'application
     *
     * @return mixed
     */
    public function run () {

        try {
            return $this->route->run();
        } catch (RouteException $routeErrors) {
           $routeErrors->Errors(
               $this->route, 
               $this->dependancies['renderer'],
               $this->url
            );
        }

        return null;
        
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  void
     */ 
    public function setUrl($url): void
    {
        $this->url = $url;
    }
}