<?php

/** @var Route $router */
$router->get('teacher/materials/{id}/edit', [
    'as' => 'web_teacher_materials_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
