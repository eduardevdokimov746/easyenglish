<?php

/** @var Route $router */
$router->post('users/store', [
    'as' => 'web_user_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
