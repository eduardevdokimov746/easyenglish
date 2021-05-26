<?php

/** @var Route $router */
$router->get('materials', [
    'as' => 'web_material_index',
    'uses'  => 'Controller@index',
    'middleware' => 'auth'
]);
