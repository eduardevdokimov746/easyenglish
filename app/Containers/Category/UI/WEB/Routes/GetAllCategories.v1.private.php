<?php

/** @var Route $router */
$router->get('categories', [
    'as' => 'web_category_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
