<?php

use App\Core\Database\QueryBuilder;
use App\Core\Database\Connection;

$app = [];

$app['config'] = require '../config.php';

require 'database/Connection.php';
require 'database/QueryBuilder.php';

$app['database'] = new QueryBuilder(
    Connection::make($app['config']['database'])
);