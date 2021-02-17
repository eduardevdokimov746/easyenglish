<?php

/** @var Route $router */
$router->get('teachers/create', [
    'as' => 'web_teacher_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
