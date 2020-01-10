<?php

//use App;
//use core\Database\{QueryBuilder, Connection};


require 'core/Router.php';
require 'core/Request.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
require 'controllers/PagesController.php';
require 'controllers/materialController.php';
require 'controllers/UserController.php';

global $app;
$app = [];

$app['config'] = require '../config.php';

$app['database'] = new QueryBuilder(
    Connection::make($app['config']['database'])
);

function view($name, $data = []) {
    extract($data);

    return require "views/{$name}.view.php";
}

function redirect($path) {
    header("Location: /{$path}");
}