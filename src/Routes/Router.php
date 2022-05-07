<?php


namespace App\Routes;


class Router {

    /**
     *
     * @var string[] l'url envoyer 
     */
    private $url;

    /**
     *
     * @var array
     */
    private $nameRoutes = [];

    /**
     *
     * @var array
     */
    private $routes = [];

    /**
     * Constructor 
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = trim($url, "/");
    }


    /**
     * Ajouter une route par rapport de sa methode 
     *
     * @param string $path
     * @param callable $callback
     * @param string|null $name
     * @param string $method
     * @return Route
     */
    private function addRoute (string $path, callable $callback, string $method,  ?string $name = null): Route {
        $route = new Route ($path, $callback, $name);
        $this->routes[$method][] = $route;
        if ($name) {
            $this->nameRoutes[$name] = $route;
        }

        return $route;
    }



    /**
     * Route en get
     *
     * @param string $path
     * @param callable $callback
     * @param string|null $name
     * @return self
     */
    public function get (string $path, callable $callback, ?string $name = null): self {
        $this->addRoute($path, $callback, "GET", $name);
        return $this;
    }

    /**
     * Route en post 
     *
     * @param string $path
     * @param callable $callback
     * @param string|null $name
     * @return self
     */
    public function post (string $path, callable $callback, ?string $name = null): self {
        $this->addRoute($path, $callback, "POST", $name);
        return $this;
    }

    /**
     * Route en get et post 
     *
     * @param string $path
     * @param callable $callback
     * @param string|null $name
     * @return self
     */
    public function map (string $path, callable $callback, ?string $name = null): self {
        $this->addRoute($path, $callback, "GET", $name);
        $this->addRoute($path, $callback, "POST", $name);
        return $this;
    }

    /**
     * L'execution des routes
     *
     * @return mixed
     */
    public function run () {

        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
           throw new RouteException("la methode que vous avez utilisé n'existe pas, vérirfier la methode puis, réessayer");
        }


        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->check($this->url)) {
                return $route->call();
            }
        }
        

        throw new RouteException("La route que vous avez pris n'existe pas");
    }

    /**
     * Permet de générer un url existant
     *
     * @param string $name
     * @param array $params
     * @return string
     */
    public function generateUri (string $name, array $params = []): string {
        if (!isset($this->nameRoutes[$name])) {
           throw new RouteException("Il n'existe pas une route qui porte ce nom ($name) ");
        }

        return "/" . $this->nameRoutes[$name]->getParams($params);
    } 


}