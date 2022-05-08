<?php

namespace App\Helpers;


class Text {



    static function extract (string $string, int $limit = 60): string {

        if (mb_strlen($string) < $limit) {
            return $string;
        }

        return substr($string, 0, $limit) . "...";
    }
}