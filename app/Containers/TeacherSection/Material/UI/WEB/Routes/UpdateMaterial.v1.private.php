<?php

/** @var Route $router */
$router->post('teacher/materials/{id}/update', [
    'as' => 'web_teacher_materials_update',
    'uses'  => 'Controller@update',
    'middleware' => 'auth'
]);
