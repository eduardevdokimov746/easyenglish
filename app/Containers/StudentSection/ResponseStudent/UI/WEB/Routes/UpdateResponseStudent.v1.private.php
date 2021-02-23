<?php

/** @var Route $router */
$router->patch('student/responses/{id}', [
    'as' => 'web_student_responses_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
