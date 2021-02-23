<?php

/** @var Route $router */
$router->get('teacher/responses', [
    'as' => 'web_teacher_responses_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
