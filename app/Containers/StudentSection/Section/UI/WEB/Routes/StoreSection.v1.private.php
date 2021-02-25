<?php

/** @var Route $router */
$router->post('student/sections/store', [
    'as' => 'web_student_sections_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
