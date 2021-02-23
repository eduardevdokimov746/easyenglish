<?php

/** @var Route $router */
$router->get('student/courses/{course}/zadanies', [
    'as' => 'web_student_zadanies_index',
    'uses'  => 'Controller@index',
]);
