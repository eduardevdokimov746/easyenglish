<?php

/** @var Route $router */
$router->post('comments/store', [
    'as' => 'web_comment_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
