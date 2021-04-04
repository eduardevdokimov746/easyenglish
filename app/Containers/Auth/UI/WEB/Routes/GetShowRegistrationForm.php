<?php

/** @var Route $router */
$router->get('register', [
    'as' => 'web_show_registration_form',
    'uses'  => 'RegisterController@showRegistrationForm',
    'middleware' => 'guest'
]);
