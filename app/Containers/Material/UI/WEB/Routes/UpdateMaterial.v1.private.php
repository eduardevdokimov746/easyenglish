<?php

/** @var Route $router */
$router->patch('materials/{id}', [
    'as' => 'web_material_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
