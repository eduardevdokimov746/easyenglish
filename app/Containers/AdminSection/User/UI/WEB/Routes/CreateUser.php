<?php

$router->get('users/create', [
    'as' => 'web_admin_users_create',
    'uses'  => 'Controller@create',
]);
