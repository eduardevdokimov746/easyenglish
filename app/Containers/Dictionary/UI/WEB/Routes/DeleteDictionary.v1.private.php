<?php

/** @var Route $router */
$router->delete('dictionary/{id}', [
    'as' => 'web_dictionary_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
