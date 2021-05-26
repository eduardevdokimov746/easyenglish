<?php

$router->post('api/teacher/materials/hide', [
    'uses' => 'Controller@hide',
    'as' => 'api_teacher_material_hide'
]);
