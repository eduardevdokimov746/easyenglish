<?php

/** @var Route $router */
$router->get('student/courses/{id}', [
    'as' => 'web_student_courses_show',
    'uses'  => 'Controller@show',
]);
