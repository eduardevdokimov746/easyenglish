<?php

/** @var Route $router */
$router->get('student/responses/{id}/edit', [
    'as' => 'web_student_responses_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
