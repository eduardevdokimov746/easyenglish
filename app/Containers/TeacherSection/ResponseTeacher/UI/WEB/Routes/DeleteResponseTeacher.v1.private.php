<?php

/** @var Route $router */
$router->delete('teacher/responses/{id}', [
    'as' => 'web_teacher_responses_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
