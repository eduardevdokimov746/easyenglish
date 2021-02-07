<?php

/** @var Route $router */
$router->get('comments', [
    'as' => 'web_comment_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
