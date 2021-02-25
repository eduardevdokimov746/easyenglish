<?php

/** @var Route $router */
$router->delete('teacher/zadanies/{id}', [
    'as' => 'web_teacher_zadanies_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
