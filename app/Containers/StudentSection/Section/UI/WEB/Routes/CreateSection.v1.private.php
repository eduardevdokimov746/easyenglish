<?php

/** @var Route $router */
$router->get('student/sections/create', [
    'as' => 'web_student_sections_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
