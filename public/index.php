<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require '../vendor/autoload.php';
require '../Core/bootstrap.php';

App\Core\Router::load('../routes.php')
	->direct(
		App\Core\Request::uri(), 
		App\Core\Request::requestType()
	);
