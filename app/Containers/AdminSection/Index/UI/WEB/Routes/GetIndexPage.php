<?php

/** @var Illuminate\Support\Facades\Route $router */
$router->get('/', [
    'as' => 'web_admin_index',
    'uses'  => 'Controller@index'
]);
