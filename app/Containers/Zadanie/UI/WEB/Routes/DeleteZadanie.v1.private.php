<?php

/** @var Route $router */
$router->delete('zadanies/{id}', [
    'as' => 'web_zadanie_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
