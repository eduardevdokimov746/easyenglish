<?php

/** @var Route $router */
$router->post('groups/{id}', [
    'as' => 'web_teacher_group_update',
    'uses'  => 'Controller@update',
    'middleware' => 'auth',
]);
