<?php

/** @var Route $router */
$router->get('practices/{id}/edit', [
    'as' => 'web_practice_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
