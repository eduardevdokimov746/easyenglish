<?php

/** @var Route $router */
$router->post('password/email', [
    'as' => 'web_send_reset_link_email',
    'uses'  => 'ForgotPasswordController@sendResetLinkEmail',
    'middleware' => 'guest'
]);
