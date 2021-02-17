<?php

/** @var Route $router */
$router->patch('courses/{id}', [
    'as' => 'web_course_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
