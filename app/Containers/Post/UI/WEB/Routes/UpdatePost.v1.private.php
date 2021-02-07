<?php

/** @var Route $router */
$router->patch('posts/{id}', [
    'as' => 'web_post_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
