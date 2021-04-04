<?php

/** @var Route $router */
$router->get('groups/{id}', [
    'as' => 'web_group_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
