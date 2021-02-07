<?php

/** @var Route $router */
$router->patch('users/{id}', [
    'as' => 'web_user_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
