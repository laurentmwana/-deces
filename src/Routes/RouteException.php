<?php


namespace App\Routes;

use App\Renderer\Renderer;
use Exception;

class RouteException extends Exception{

    public function Errors (Router $route, Renderer $renderer, string $url) {
        http_response_code(404);
        $message = $this->getMessage();
        return $renderer
        ->render("errors@error", compact("message", "url"), "error");
    }

}