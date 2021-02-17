<?php

/** @var Route $router */
$router->delete('practices/{id}', [
    'as' => 'web_practice_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
