<?php

/** @var Route $router */
$router->get('courses/create', [
    'as' => 'web_course_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
