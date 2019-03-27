<?php

namespace App\Core;


class Request
{
	public $request;

	public function __construct()
	{
		return $this->request = $this->data();
	}

    public static function uri()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        $uri = preg_replace ('/\?(.*)/' , '' , $uri);

        return $uri;
    }

    public static function requestType()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function data()
    {
    	return (object)[
    		'get' => $_GET,
    		'post' => $_POST,
    		'request' => $_REQUEST,
    		'server' => $_SERVER,
    	];
    }
}