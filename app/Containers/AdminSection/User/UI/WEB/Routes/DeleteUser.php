<?php

/** @var Route $router */
$router->get('users/{id}/delete', [
    'as' => 'web_admin_users_delete',
    'uses'  => 'Controller@delete',
    'middleware' => 'admin'
]);
