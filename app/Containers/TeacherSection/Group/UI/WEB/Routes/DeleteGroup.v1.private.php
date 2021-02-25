<?php

/** @var Route $router */
$router->delete('groups/{id}', [
    'as' => 'web_group_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
