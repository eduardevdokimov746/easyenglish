<?php

$router->post('api/forgot-password/checkIssetEmail', [
    'as' => 'api_forgot_password_check_exist_email',
    'uses' => 'ForgotPasswordController@checkExistEmail'
]);
