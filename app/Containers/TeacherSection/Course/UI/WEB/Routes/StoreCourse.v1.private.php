<?php

/** @var Route $router */
$router->post('teacher/courses/store', [
    'as' => 'web_teacher_courses_store',
    'uses'  => 'Controller@store',
    'middleware' => 'auth'
]);
