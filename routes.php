<?php
/*
$router->define([
    '' => 'controllers/index.php',
    'about' => 'controllers/about.php',
    'about/culture' => 'controllers/about-culture.php',
    'contact' => 'controllers/contact.php',
    'admin' => 'controllers/test.php',
    'addmaterial' => 'controllers/add-material.php',
    'material' => 'controllers/material.php'
]);
*/

$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');
$router->get('addmaterial','materialController@index');
$router->get('delete_material','materialController@delete_material');
$router->get('feedback','PagesController@feedback');
$router->get('login','UserController@index');
$router->get('login','UserController@index');
$router->get('logout','UserController@logout');
$router->get('register','PagesController@register');

//$router->get('addmaterial','materialController@index');

$router->post('save_feedback','controllers/save_feedback.php');
$router->post('store','materialController@store');
$router->post('update','materialController@update');
$router->post('login','UserController@login');
$router->post('register','UserController@register');

//var_dump($router ->routes);