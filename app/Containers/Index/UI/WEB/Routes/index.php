<?php

$router->get('/', [
    'as'   => 'index',
    'uses' => 'Controller@index',
    'middleware' => 'auth'
]);
