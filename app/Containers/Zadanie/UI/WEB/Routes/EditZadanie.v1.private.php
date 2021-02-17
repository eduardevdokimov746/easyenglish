<?php

/** @var Route $router */
$router->get('zadanies/{id}/edit', [
    'as' => 'web_zadanie_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
