<?php

/** @var Route $router */
$router->post('groups/store', [
    'as' => 'web_group_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
