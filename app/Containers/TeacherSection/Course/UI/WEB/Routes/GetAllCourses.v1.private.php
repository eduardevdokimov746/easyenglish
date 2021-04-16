<?php

/** @var Route $router */
$router->get('teacher/courses', [
    'as' => 'web_teacher_courses_index',
    'uses'  => 'Controller@index',
    'middleware' => 'auth'
]);
