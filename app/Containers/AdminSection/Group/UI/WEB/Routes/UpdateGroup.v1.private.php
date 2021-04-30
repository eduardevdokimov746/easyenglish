<?php

$router->post('groups/{id}/update', [
    'as' => 'web_admin_group_update',
    'uses'  => 'Controller@update',
    'middleware' => 'auth',
]);
