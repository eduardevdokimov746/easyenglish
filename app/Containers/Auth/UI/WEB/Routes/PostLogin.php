<?php

/** @var Route $router */
$router->post('login', [
    'as' => 'web_login',
    'uses'  => 'LoginController@login',
]);
