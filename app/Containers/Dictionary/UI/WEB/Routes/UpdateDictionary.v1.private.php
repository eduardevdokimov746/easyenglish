<?php

/** @var Route $router */
$router->patch('dictionary/{id}', [
    'as' => 'web_dictionary_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
