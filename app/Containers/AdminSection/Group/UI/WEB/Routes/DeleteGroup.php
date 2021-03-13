<?php

/** @var Route $router */
$router->delete('groups/{id}', [
    'as' => 'web_admin_group_delete',
    'uses'  => 'Controller@delete',
]);
