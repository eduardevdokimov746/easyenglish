<?php

/** @var Route $router */
$router->patch('teacher/responses/{id}', [
    'as' => 'web_teacher_responses_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
