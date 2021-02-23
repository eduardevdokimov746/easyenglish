<?php

/** @var Route $router */
$router->get('teacher/materials', [
    'as' => 'web_teacher_materials_index',
    'uses'  => 'Controller@index',
]);
