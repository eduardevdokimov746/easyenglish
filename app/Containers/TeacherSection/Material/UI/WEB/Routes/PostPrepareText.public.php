<?php

$router->post('teacher/materials/prepare-text', [
    'uses' => 'Controller@prepareText',
    'as' => 'web_teacher_materials_prepare_text',
    'middleware' => 'web'
]);
