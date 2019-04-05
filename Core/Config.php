<?php

namespace App\Core;

class Config {
    
    public static function con()
    {
        return require '../config.php';
    }

}