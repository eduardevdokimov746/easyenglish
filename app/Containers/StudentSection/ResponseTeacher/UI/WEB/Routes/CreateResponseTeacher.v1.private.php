<?php

/** @var Route $router */
$router->get('student/responses/create', [
    'as' => 'web_student_responses_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
