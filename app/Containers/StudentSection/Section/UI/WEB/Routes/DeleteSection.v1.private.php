<?php

/** @var Route $router */
$router->delete('student/sections/{id}', [
    'as' => 'web_student_sections_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
