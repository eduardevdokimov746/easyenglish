<?php

/** @var Route $router */
$router->get('teachers/{id}', [
    'as' => 'web_teacher_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
