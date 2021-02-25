<?php

/** @var Route $router */
$router->get('teacher/responses/{id}/edit', [
    'as' => 'web_teacher_responses_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
