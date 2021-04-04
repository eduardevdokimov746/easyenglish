<?php

/** @var Route $router */
$router->get('groups', [
    'as' => 'web_admin_group_index',
    'uses'  => 'Controller@index',
]);
