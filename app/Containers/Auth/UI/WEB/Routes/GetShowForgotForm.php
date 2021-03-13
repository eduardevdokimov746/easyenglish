<?php

/** @var Route $router */
$router->get('password/reset', [
    'as' => 'web_show_forgot_form',
    'uses'  => 'ForgotPasswordController@showForgotForm',
]);
