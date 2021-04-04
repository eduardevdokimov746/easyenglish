<?php

$router->get('confirm-email/send-code', [
    'uses' => 'ConfirmEmailController@sendDublicateMail',
    'as' => 'web_send_dublicate_confirm_email_code',
    'middleware' => 'auth'
]);
