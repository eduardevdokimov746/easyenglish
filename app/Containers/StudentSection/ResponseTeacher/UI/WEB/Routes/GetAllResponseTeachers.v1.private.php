<?php

/** @var Route $router */
$router->get('student/responses', [
    'as' => 'web_student_responses_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
