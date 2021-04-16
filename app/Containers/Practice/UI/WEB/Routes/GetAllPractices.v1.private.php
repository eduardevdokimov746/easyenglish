<?php

/** @var Route $router */
$router->get('practices', [
    'as' => 'web_practice_index',
    'uses'  => 'Controller@index',
    'middleware' => 'auth'
]);
