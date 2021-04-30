<?php

/** @var Route $router */
$router->get('teacher/sections/{id}/delete', [
    'as' => 'web_teacher_sections_delete',
    'uses'  => 'Controller@delete',
    'middleware' => 'auth'
]);
