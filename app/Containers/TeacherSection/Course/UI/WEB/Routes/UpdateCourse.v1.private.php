<?php

/** @var Route $router */
$router->post('teacher/courses/{id}/update', [
    'as' => 'web_teacher_courses_update',
    'uses'  => 'Controller@update',
    'middleware' => 'auth'
]);
