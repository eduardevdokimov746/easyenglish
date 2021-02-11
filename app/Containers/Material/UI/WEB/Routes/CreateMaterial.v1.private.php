<?php

/** @var Route $router */
$router->get('materials/create', [
    'as' => 'web_material_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
