<?php

/** @var Route $router */
$router->post('groups/store', [
    'as' => 'web_admin_group_store',
    'uses'  => 'Controller@store',
]);
