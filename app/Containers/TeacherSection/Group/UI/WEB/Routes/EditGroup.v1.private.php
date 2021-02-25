<?php

/** @var Route $router */
$router->get('groups/{id}/edit', [
    'as' => 'web_group_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
