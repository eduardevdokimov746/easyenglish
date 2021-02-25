<?php

/** @var Route $router */
$router->get('teacher/sections/{id}', [
    'as' => 'web_teacher_sections_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
