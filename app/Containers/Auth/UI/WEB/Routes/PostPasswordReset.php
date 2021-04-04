<?php

/** @var Route $router */
$router->post('password/reset', [
    'as' => 'web_password_reset',
    'uses'  => 'ResetPasswordController@reset',
    'middleware' => 'guest'
]);
