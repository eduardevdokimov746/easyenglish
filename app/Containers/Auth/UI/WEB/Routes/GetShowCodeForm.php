<?php

/** @var Route $router */
$router->get('password/code', [
    'as' => 'web_show_code_form',
    'uses'  => 'ForgotPasswordController@showCodeForm',
]);
