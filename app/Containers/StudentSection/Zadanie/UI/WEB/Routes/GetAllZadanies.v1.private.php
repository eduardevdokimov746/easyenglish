<?php

/** @var Route $router */
$router->get('student/courses/{id}/zadanies', [
    'as' => 'web_student_zadanies_index',
    'uses'  => 'Controller@index',
    'middleware' => 'auth'
]);
