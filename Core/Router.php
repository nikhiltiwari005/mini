<?php

namespace App\Core;

use App\Core\Request;
use App\Core\Errors;


class Router
{
    protected $routes = [
        'GET',
        'POST',
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        try {

            if (array_key_exists($uri, $this->routes[$requestType])) {

                if (is_callable($this->routes[$requestType][$uri])) {
                    return $this->routes[$requestType][$uri]();
                }
                
                $toCall = $this->extract($this->routes[$requestType][$uri]);

                if (is_array($toCall)) {
                    $class = "\App\Controller\\".$toCall['class'];
                    $method = $toCall['method'];
                    $callThis = new $class;
                }

                return $callThis->$method(new Request);
            }

            throw new \Exception('No route defined for this URI.');

        } catch (\Exception $e) {
            // echo $e->message;
            return Errors::errorCode('404');
        }
    }

    private function extract($uri) {

        $extractKey = explode('@', $uri);

        if (is_array($extractKey)) {

            return [
                'class' =>  $extractKey[0],
                'method' =>  $extractKey[1]
            ];
        }

        throw new \Exception('Invalid Controller And Method');

    }
}
