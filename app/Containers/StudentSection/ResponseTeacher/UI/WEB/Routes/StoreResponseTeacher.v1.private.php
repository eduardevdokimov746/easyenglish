<?php

/** @var Route $router */
$router->post('student/responses/store', [
    'as' => 'web_student_response_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
