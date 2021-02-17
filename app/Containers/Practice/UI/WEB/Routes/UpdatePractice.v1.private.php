<?php

/** @var Route $router */
$router->patch('practices/{id}', [
    'as' => 'web_practice_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
