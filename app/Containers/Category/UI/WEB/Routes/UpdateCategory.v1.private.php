<?php

/** @var Route $router */
$router->patch('categories/{id}', [
    'as' => 'web_category_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
