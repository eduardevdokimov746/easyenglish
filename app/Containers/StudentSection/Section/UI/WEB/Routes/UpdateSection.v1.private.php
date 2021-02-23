<?php

/** @var Route $router */
$router->patch('student/sections/{id}', [
    'as' => 'web_student_sections_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
