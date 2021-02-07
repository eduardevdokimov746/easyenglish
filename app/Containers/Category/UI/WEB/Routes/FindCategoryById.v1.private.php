<?php

/** @var Route $router */
$router->get('categories/{id}', [
    'as' => 'web_category_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
