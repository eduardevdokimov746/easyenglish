<?php

/** @var Route $router */
$router->get('student/sections', [
    'as' => 'web_student_sections_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
