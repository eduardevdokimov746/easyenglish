<?php

$router->get('teacher/sections/{id}/hide', [
    'uses' => 'Controller@hide',
    'as' => 'web_teacher_sections_hide',
    'middleware' => 'auth'
]);
