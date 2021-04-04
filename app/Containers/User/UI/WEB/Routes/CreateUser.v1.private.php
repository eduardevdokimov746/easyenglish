<?php

/** @var Route $router */
$router->get('users/create', [
    'as' => 'web_user_create',
    'uses'  => 'Controller@create',
]);
