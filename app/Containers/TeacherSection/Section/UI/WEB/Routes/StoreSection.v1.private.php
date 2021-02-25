<?php

/** @var Route $router */
$router->post('teacher/sections/store', [
    'as' => 'web_teacher_sections_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
