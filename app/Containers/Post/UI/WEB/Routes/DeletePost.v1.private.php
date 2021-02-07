<?php

/** @var Route $router */
$router->delete('posts/{id}', [
    'as' => 'web_post_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
