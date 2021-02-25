<?php

/** @var Route $router */
$router->get('teacher/responses/create', [
    'as' => 'web_teacher_responses_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
