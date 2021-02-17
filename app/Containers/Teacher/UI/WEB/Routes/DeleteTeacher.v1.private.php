<?php

/** @var Route $router */
$router->delete('teachers/{id}', [
    'as' => 'web_teacher_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
