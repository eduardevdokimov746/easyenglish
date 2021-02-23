<?php

/** @var Route $router */
$router->get('student/zadanies/create', [
    'as' => 'web_student_zadanies_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
