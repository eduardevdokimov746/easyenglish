<?php

/** @var Route $router */
$router->get('dictionary/{id}/edit', [
    'as' => 'web_dictionary_edit',
    'uses'  => 'Controller@edit',
    'middleware' => 'auth'
]);
