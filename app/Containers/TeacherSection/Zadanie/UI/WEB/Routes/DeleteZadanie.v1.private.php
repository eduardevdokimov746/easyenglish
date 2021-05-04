<?php

/** @var Route $router */
$router->get('teacher/zadanies/{id}/delete', [
    'as' => 'web_teacher_zadanies_delete',
    'uses'  => 'Controller@delete',
    'middleware' => 'auth',
]);
