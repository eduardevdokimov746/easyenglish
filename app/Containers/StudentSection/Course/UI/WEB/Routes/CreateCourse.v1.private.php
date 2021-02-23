<?php

/** @var Route $router */
$router->get('student/courses/create', [
    'as' => 'web_student_courses_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
