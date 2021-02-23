<?php

/** @var Route $router */
$router->get('teacher/materials/{id}', [
    'as' => 'web_teacher_materials_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
