<?php

/** @var Route $router */
$router->get('user1s/{id}', [
    'as' => 'web_user1_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
