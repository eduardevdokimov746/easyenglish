<?php

/** @var Route $router */
$router->patch('student/zadanies/{id}', [
    'as' => 'web_student_zadanies_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
