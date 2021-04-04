<?php

$router->post('api/register/checkValidLogin', [
    'as' => 'api_register_check_valid_login',
    'uses' => 'RegisterController@checkValidLogin'
]);
