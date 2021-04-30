<?php

$router->get('users/{id}', [
    'as' => 'web_admin_user_show',
    'uses'  => 'Controller@show',
    'middleware' => 'admin',
]);
