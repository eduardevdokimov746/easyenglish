<?php

$router->post('teacher/materials/{id}/prepare-text/update', [
    'uses' => 'Controller@prepareTextUpdate',
    'as' => 'web_teacher_materials_prepare_text_update',
    'middleware' => 'web'
]);
