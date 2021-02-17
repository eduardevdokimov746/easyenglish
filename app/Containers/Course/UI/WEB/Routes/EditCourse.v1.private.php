<?php

/** @var Route $router */
$router->get('courses/{id}/edit', [
    'as' => 'web_course_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
