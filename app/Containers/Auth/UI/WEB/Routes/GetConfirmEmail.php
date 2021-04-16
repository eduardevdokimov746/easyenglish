<?php

$router->get('verify-email/{code}', [
    'uses' => 'ConfirmEmailController@handler',
    'as' => 'web_confirm_email'
]);
