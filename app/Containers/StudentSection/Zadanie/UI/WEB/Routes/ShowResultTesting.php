<?php

/** @var Route $router */
$router->get('student/courses/{course}/zadanies/{zadanie}/result', [
    'as' => 'web_student_zadanies_result_testing',
    'uses'  => 'Controller@result',
]);
