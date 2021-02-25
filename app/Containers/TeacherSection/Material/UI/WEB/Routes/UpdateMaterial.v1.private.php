<?php

/** @var Route $router */
$router->patch('teacher/materials/{id}', [
    'as' => 'web_teacher_materials_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
