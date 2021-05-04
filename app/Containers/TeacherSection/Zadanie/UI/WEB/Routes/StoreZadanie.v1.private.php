<?php

/** @var Route $router */
$router->post('teacher/zadanies/store', [
    'as' => 'web_teacher_zadanies_store',
    'uses'  => 'Controller@store',
    'middleware' => 'auth',
]);
