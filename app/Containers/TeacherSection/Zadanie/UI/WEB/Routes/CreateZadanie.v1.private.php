<?php

/** @var Route $router */
$router->get('teacher/zadanies/create', [
    'as' => 'web_teacher_zadanies_create',
    'uses'  => 'Controller@create',
    'middleware' => 'auth'
]);
