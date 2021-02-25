<?php

/** @var Route $router */
$router->get('student/responses/{id}', [
    'as' => 'web_student_responses_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
