<?php

/** @var Route $router */
$router->get('password/reset/{token}', [
    'as' => 'web_show_reset_form',
    'uses'  => 'ResetPasswordController@showResetForm',
]);
