<?php

/** @var Route $router */
$router->post('practices/store', [
    'as' => 'web_practice_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
