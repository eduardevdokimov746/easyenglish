<?php

/** @var Route $router */
$router->get('password/update', [
    'as' => 'web_show_reset_form',
    'uses'  => 'ResetPasswordController@showResetForm',
    'middleware' => 'guest'
]);
