<?php

/** @var Route $router */
$router->get('users', [
    'as' => 'web_admin_user_index',
    'uses'  => 'Controller@index',
]);
