<?php

/** @var Route $router */
$router->get('groups/{id}/delete', [
    'as' => 'web_admin_group_delete',
    'uses'  => 'Controller@delete',
    'middleware' => 'admin'
]);
