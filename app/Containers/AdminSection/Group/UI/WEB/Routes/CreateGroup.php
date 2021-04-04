<?php

/** @var Route $router */
$router->get('groups/create', [
    'as' => 'web_admin_group_create',
    'uses'  => 'Controller@create',
]);
