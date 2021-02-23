<?php

/** @var Route $router */
$router->delete('student/zadanies/{id}', [
    'as' => 'web_student_zadanies_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
