<?php

/** @var Route $router */
$router->get('dictionary/{id}', [
    'as' => 'web_dictionary_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
