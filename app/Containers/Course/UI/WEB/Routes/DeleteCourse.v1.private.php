<?php

/** @var Route $router */
$router->delete('courses/{id}', [
    'as' => 'web_course_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
