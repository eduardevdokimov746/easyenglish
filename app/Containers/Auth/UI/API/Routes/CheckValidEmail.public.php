<?php

$router->post('api/register/checkValidEmail', [
    'as' => 'api_register_check_valid_email',
    'uses' => 'RegisterController@checkValidEmail'
]);
