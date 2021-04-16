<?php

/** @var Route $router */
$router->get('teacher/courses/create', [
    'as' => 'web_teacher_courses_create',
    'uses'  => 'Controller@create',
    'middleware' => 'auth'
]);
