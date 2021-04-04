<?php

/** @var Route $router */
$router->get('groups/{id}/edit', [
    'as' => 'web_admin_group_edit',
    'uses'  => 'Controller@edit',
]);
