<?php

/** @var Route $router */
$router->patch('teacher/zadanies/{id}', [
    'as' => 'web_teacher_zadanies_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
