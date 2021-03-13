<?php

/** @var Route $router */
$router->delete('users/{id}', [
    'as' => 'web_admin_users_delete',
    'uses'  => 'Controller@delete',
]);
