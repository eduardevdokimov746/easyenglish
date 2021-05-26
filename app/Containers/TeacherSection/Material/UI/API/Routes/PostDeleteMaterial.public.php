<?php

$router->post('api/teacher/materials/delete', [
    'uses' => 'Controller@delete',
    'as' => 'api_teacher_material_delete'
]);
