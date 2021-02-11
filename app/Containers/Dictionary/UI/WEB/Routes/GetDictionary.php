<?php

/** @var Route $router */
$router->get('dictionary', [
    'as' => 'web_dictionary_index',
    'uses'  => 'Controller@index',
]);
