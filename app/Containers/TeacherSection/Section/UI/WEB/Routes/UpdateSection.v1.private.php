<?php

$router->post('teacher/sections/{id}/update', [
    'as' => 'web_teacher_sections_update',
    'uses'  => 'Controller@update',
    'middleware' => 'auth',
]);
