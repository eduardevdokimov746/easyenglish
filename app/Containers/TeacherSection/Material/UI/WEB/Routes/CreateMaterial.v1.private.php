<?php

/** @var Route $router */
$router->get('teacher/materials/create', [
    'as' => 'web_teacher_materials_create',
    'uses'  => 'Controller@create',
]);
