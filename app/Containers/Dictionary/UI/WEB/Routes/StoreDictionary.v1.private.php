<?php

/** @var Route $router */
$router->post('dictionary/store', [
    'as' => 'web_dictionary_store',
    'uses'  => 'Controller@store',
    'middleware' => 'auth'
]);
