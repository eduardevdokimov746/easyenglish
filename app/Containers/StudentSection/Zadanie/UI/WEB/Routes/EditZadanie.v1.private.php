<?php

/** @var Route $router */
$router->get('student/zadanies/{id}/edit', [
    'as' => 'web_student_zadanies_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
