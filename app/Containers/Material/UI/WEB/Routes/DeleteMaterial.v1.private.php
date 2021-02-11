<?php

/** @var Route $router */
$router->delete('materials/{id}', [
    'as' => 'web_material_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
