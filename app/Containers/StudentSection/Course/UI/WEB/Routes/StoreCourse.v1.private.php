<?php

/** @var Route $router */
$router->post('student/courses/store', [
    'as' => 'web_student_courses_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
