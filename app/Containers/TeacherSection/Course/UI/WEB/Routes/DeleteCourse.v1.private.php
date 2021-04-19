<?php

/** @var Route $router */
$router->get('teacher/courses/{id}/delete', [
    'as' => 'web_teacher_courses_delete',
    'uses'  => 'Controller@delete',
    'where' => ['id' => '[0-9]+'],
    'middleware' => 'auth'
]);