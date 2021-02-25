<?php

/** @var Route $router */
$router->delete('teacher/sections/{id}', [
    'as' => 'web_teacher_sections_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
