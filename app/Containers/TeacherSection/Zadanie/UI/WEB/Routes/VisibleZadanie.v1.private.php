<?php

/** @var Route $router */
$router->get('teacher/zadanies/{id}/visible', [
    'as' => 'web_teacher_zadanies_visible',
    'uses'  => 'Controller@visible',
    'middleware' => 'auth',
]);
