<?php

/** @var Route $router */
$router->get('teacher/sections', [
    'as' => 'web_teacher_sections_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
