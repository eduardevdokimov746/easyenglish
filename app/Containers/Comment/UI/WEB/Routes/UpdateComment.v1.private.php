<?php

/** @var Route $router */
$router->patch('comments/{id}', [
    'as' => 'web_comment_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
