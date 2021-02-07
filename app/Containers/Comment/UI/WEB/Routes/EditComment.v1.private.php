<?php

/** @var Route $router */
$router->get('comments/{id}/edit', [
    'as' => 'web_comment_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
