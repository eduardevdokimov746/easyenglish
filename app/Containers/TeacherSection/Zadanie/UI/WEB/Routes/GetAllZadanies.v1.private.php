<?php

/** @var Route $router */
$router->get('teacher/courses/{id}/zadanies', [
    'as' => 'web_teacher_zadanies_index',
    'uses'  => 'Controller@index',
    'middleware' => 'auth'
]);
