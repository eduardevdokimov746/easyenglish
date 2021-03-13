<?php

/** @var Route $router */
$router->patch('user1s/{id}', [
    'as' => 'web_user1_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
