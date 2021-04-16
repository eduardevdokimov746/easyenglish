<?php

/** @var Route $router */
$router->get('dictionary/create', [
    'as' => 'web_dictionary_create',
    'uses'  => 'Controller@create',
    'middleware' => 'auth'
]);
