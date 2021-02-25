<?php

/** @var Route $router */
$router->get('teacher/sections/{id}/edit', [
    'as' => 'web_teacher_sections_edit',
    'uses'  => 'Controller@edit',
]);
