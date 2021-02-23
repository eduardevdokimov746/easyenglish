<?php

/** @var Route $router */
$router->delete('student/responses/{id}', [
    'as' => 'web_student_responses_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
