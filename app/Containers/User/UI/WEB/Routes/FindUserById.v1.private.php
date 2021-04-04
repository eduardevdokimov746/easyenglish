<?php

/** @var Route $router */
$router->get('users/{id}', [
    'as' => 'web_user_show',
    'uses'  => 'Controller@show',
    'middleware' => 'auth'
]);
