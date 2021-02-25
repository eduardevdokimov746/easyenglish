<?php

/** @var Route $router */
$router->post('teacher/materials/store', [
    'as' => 'web_teacher_materials_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
