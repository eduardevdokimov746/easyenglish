<?php

/** @var Route $router */
$router->get('groups/create', [
    'as' => 'web_group_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
