<?php

$router->get('teacher/sections/{id}/visible', [
    'uses' => 'Controller@visible',
    'as' => 'web_teacher_sections_visible',
    'middleware' => 'auth'
]);
