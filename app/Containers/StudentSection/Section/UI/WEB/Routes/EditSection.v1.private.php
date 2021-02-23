<?php

/** @var Route $router */
$router->get('student/sections/{id}/edit', [
    'as' => 'web_student_sections_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
