<?php

/** @var Route $router */
$router->get('student/courses/{course}/zadanies/{zadanie}', [
    'as' => 'web_student_zadanies_show',
    'uses'  => 'Controller@show',
]);
