<?php

/** @var Route $router */
$router->get('teacher/groups', [
    'as' => 'web_teacher_groups_index',
    'uses'  => 'Controller@index',
    'middleware' => 'auth'
]);
