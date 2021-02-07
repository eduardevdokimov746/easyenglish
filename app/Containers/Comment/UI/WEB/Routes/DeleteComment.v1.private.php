<?php

/** @var Route $router */
$router->delete('comments/{id}', [
    'as' => 'web_comment_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
