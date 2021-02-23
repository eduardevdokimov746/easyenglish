<?php

/** @var Route $router */
$router->patch('student/courses/{id}', [
    'as' => 'web_student_courses_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
