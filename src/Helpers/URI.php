<?php

namespace App\Helpers;

class URI {

    /**
     * 
     * Permet de faire des rédirections de pages 
     *
     * @param string $path
     * @param integer $code
     * @return void
     */
    static function redirect (string $path, int $code = 301): void {
        header("Location: {$path}", true, $code);
        exit();
    }
}