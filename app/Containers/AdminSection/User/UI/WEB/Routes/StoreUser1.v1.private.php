<?php

$router->post('users/store', [
    'as' => 'web_admin_users_store',
    'uses'  => 'Controller@store',
    'middleware' => 'admin',
]);
