<?php

/** @var Route $router */
$router->post('user1s/store', [
    'as' => 'web_user1_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
