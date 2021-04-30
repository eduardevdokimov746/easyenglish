<?php

$router->patch('users/{id}', [
    'as' => 'web_admin_user_update',
    'uses'  => 'Controller@update',
    'middleware' => 'admin',
]);
