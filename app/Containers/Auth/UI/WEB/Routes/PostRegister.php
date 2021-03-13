<?php

/** @var Route $router */
$router->post('register', [
    'as' => 'web_register',
    'uses'  => 'RegisterController@register',
]);
