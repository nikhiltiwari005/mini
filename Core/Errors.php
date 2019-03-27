<?php

namespace App\Core;

class Errors
{
	public static function errorCode (String $str) {
        return view('errors/'.$str);
    }
}