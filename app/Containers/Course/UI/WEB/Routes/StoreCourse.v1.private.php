<?php

/** @var Route $router */
$router->post('courses/store', [
    'as' => 'web_course_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
