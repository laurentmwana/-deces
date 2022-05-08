<?php


namespace App\Routes;


class Route {

    /**
     *
     * @var string
     */
    private string $name;

    /**
     *
     * @var callable
     */
    private $callback;

    /**
     *
     * @var string
     */
    private string $path;

    /**
     *
     * @var array
     */
    private $matches = [];

    /**
     * Constructor 
     *
     * @param string $path
     * @param callable $callback
     * @param string|null $name
     */
    public function __construct(string $path, callable $callback, ?string $name = null)
    {
        $this->name = $name;
        $this->callback = $callback;
        $this->path = trim($path, "/");
    }



    /**
     * getter getName
     *
     * @return string
     */
    public function getName (): string {
        return $this->name;
    }


    /**
     * getter getCallback
     *
     * @return callable
     */
    public function getCallback (): callable {
        return $this->callback;
    }

    /**
     * gettter getPath
     *
     * @return string
     */
    public function getPath (): string {
        return $this->path;
    }

    /**
     * vérifie que la route définie et la route envoter  corresponde
     *
     * @param string $url
     * @return boolean
     */
    public function check (string $url): bool {
        
        $path = preg_replace('#:([\w]+)#', '([^/]+)',  $this->getPath());
        $regex = "#^{$path}$#i";
        if (preg_match($regex, $url, $matches)) {
            array_shift($matches);
            $this->matches = $matches;
            return true;
        }

        return false;
    }

    /**
     * Charger le bon module
     *
     * @return mixed
     */
    public function call () {
        return call_user_func_array($this->getCallback(), $this->matches);
    }

    /**
     * Les paramètres passer 
     *
     * @param array $params
     * @return string
     */
    public function getParams (array $params): string {
        $path = $this->getPath();
        foreach ($params as $key => $value) {
            $path = str_replace(":$key", $value, $this->getPath());
        }

        return $path;
    }
}