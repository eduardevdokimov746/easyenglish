<?php

/** @var Route $router */
$router->get('users/{id}/edit', [
    'as' => 'web_user_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
