<?php

/** @var Route $router */
$router->get('categories/create', [
    'as' => 'web_category_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
