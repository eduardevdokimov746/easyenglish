<?php

/** @var Route $router */
$router->patch('zadanies/{id}', [
    'as' => 'web_zadanie_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
