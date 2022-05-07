<?php


namespace App\Renderer;


class Renderer {

    /**
     *
     * @var string
     */
    private $path;

    /**
     *
     * @var array
     */
    private $globals = [];
    
    /**
     *
     * @var array
     */
    private $layout = [];


    /**
     * Constructor 
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $this->replace($path);

        $this->setLayout("defualt", "layout");
        $this->setLayout("adminer", "administrator");
        $this->setLayout("error", "layoutError");
    }

    /**
     * Gettter de path 
     * 
     * @return string
     */ 
    public function getPath(): string
    {
        return $this->path;
    }


    /**
     * Rendre les vues 
     *
     * @param string $path
     * @param array $params
     * @param string $keyLayout
     * @return void
     */
    public function render (string $path, array $params = [], string $keyLayout = "defualt"): void {
      
        ob_start();
        if (!empty($params)) extract($params);
        if (!empty($this->getGlobals())) extract($this->getGlobals());
        require ($this->getPath() . $this->replace($path) . ".php");
        $content = ob_get_clean();
        require ($this->replace($this->getLayout($keyLayout)) . ".php");
    }
    
    /**
     * Permet de remplacer . par un "/"
     *
     * @param string $subjet
     * @param string $search
     * @return string
     */
    private function replace (string $subjet, string $search = "@"): string {
        return str_replace($search, DIRECTORY_SEPARATOR, $subjet);
    }

    /**
     * Get the value of globals
     */ 
    public function getGlobals()
    {
        return $this->globals;
    }

    /**
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setGlobals(string $key, $value): void 
    {
        $this->globals[$key] = $value;
    }

    /**
     *
     * @param string $key
     * @return string
     */
    public function getLayout(string $key): string
    {
        return $this->getPath() . "layout" . DIRECTORY_SEPARATOR .  $this->layout[$key];
    }

    /**
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setLayout(string $key, $value): void
    {
        $this->layout[$key] = $value;
    }
}