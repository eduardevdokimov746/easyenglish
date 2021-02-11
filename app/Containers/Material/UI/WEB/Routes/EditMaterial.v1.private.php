<?php

/** @var Route $router */
$router->get('materials/{id}/edit', [
    'as' => 'web_material_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
