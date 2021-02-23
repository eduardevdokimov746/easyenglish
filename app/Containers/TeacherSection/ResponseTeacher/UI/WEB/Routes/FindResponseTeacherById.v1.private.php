<?php

/** @var Route $router */
$router->get('teacher/responses/{id}', [
    'as' => 'web_teacher_responses_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
