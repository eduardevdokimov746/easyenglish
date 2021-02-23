<?php

/** @var Route $router */
$router->patch('teacher/sections/{id}', [
    'as' => 'web_teacher_sections_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
