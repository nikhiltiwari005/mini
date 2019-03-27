<?php

$router->get('', 'HomeController@index');

$router->get('test', function(){
    echo 'test clouser';
});
