<?php

$router->post('api/teacher/materials/show', [
    'uses' => 'Controller@show',
    'as' => 'api_teacher_material_show'
]);
