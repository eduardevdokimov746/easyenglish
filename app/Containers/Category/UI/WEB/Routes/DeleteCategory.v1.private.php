<?php

/** @var Route $router */
$router->delete('categories/{id}', [
    'as' => 'web_category_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
