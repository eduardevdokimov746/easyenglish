<?php

/** @var Route $router */
$router->delete('teacher/courses/{id}', [
    'as' => 'web_teacher_courses_delete',
    'uses'  => 'Controller@delete',
    'where' => ['id' => '[^zadanies]+'],
    'middleware' => 'auth'
]);
