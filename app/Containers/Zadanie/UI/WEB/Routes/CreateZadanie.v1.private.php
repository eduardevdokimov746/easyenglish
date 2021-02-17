<?php

/** @var Route $router */
$router->get('zadanies/create', [
    'as' => 'web_zadanie_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
