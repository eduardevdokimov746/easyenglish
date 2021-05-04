<?php

/** @var Route $router */
$router->get('teacher/zadanies/{id}/hide', [
    'as' => 'web_teacher_zadanies_hide',
    'uses'  => 'Controller@hide',
    'middleware' => 'auth',
]);
