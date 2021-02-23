<?php

/** @var Route $router */
$router->get('teacher/sections/create', [
    'as' => 'web_teacher_sections_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
