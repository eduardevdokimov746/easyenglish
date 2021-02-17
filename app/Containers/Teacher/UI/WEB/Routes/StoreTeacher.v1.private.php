<?php

/** @var Route $router */
$router->post('teachers/store', [
    'as' => 'web_teacher_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
