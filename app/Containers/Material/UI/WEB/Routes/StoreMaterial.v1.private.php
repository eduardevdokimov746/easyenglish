<?php

/** @var Route $router */
$router->post('materials/store', [
    'as' => 'web_material_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
