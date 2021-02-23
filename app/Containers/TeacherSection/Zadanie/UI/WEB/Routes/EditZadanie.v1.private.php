<?php

/** @var Route $router */
$router->get('teacher/zadanies/{id}/edit', [
    'as' => 'web_teacher_zadanies_edit',
    'uses'  => 'Controller@edit',
]);
