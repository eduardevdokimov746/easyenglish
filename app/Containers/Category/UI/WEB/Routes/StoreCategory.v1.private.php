<?php

/** @var Route $router */
$router->post('categories/store', [
    'as' => 'web_category_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
