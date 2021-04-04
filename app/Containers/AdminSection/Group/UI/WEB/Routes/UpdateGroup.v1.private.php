<?php

/** @var Route $router */
$router->patch('groups/{id}', [
    'as' => 'web_group_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
