<?php

/** @var Route $router */
$router->get('teacher/zadanies/{id}', [
    'as' => 'web_teacher_zadanies_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
