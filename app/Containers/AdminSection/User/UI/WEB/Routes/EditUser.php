<?php

/** @var Route $router */
$router->get('users/{id}/edit', [
    'as' => 'web_admin_users_edit',
    'uses'  => 'Controller@edit',
    'middleware' => 'admin'
]);
