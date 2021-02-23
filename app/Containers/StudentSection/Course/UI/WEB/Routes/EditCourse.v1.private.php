<?php

/** @var Route $router */
$router->get('student/courses/{id}/edit', [
    'as' => 'web_student_courses_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
