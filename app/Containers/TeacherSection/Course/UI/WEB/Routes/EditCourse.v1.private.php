<?php

/** @var Route $router */
$router->get('teacher/courses/{id}/edit', [
    'as' => 'web_teacher_courses_edit',
    'uses'  => 'Controller@edit',
]);
