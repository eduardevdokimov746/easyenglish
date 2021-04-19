<?php

$router->post('login', [
    'uses' => 'LoginController@login',
    'as' => 'web_admin_login',
    'middleware' => 'guest'
]);