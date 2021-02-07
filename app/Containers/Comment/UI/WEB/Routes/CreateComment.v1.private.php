<?php

/** @var Route $router */
$router->get('comments/create', [
    'as' => 'web_comment_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
