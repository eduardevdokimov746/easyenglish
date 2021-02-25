<?php

/** @var Route $router */
$router->get('student/sections/{id}', [
    'as' => 'web_student_sections_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
