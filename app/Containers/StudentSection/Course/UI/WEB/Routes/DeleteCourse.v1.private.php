<?php

/** @var Route $router */
$router->delete('student/courses/{id}', [
    'as' => 'web_student_courses_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
