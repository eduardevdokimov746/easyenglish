<?php

/** @var Route $router */
$router->get('student/courses', [
    'as' => 'web_student_courses_index',
    'uses'  => 'Controller@index',
]);
