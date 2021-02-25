<?php

/** @var Route $router */
$router->delete('teacher/materials/{id}', [
    'as' => 'web_teacher_materials_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
