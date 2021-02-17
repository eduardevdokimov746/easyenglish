<?php

/** @var Route $router */
$router->patch('teachers/{id}', [
    'as' => 'web_teacher_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
