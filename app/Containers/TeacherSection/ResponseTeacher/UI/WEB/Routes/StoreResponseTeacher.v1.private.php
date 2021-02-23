<?php

/** @var Route $router */
$router->post('teacher/responses/store', [
    'as' => 'web_teacher_responses_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
