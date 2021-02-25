<?php

/** @var Route $router */
$router->get('teacher/courses/{id}', [
    'as' => 'web_teacher_courses_show',
    'uses'  => 'Controller@show',
    'where' => ['id' => '\b(?:(?!zadanie).)+\b']
]);
