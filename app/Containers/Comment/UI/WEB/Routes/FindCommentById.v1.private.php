<?php

/** @var Route $router */
$router->get('comments/{id}', [
    'as' => 'web_comment_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
