<?php

/** @var Route $router */
$router->get('login', [
    'as' => 'web_admin_show_login_form',
    'uses'  => 'LoginController@showLoginForm',
    'middleware' => 'guest'
]);
