<?php

/** @var Route $router */
$router->patch('teacher/courses/{id}', [
    'as' => 'web_teacher_courses_update',
    'uses'  => 'Controller@update',
]);
