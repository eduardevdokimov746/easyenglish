<?php

/** @var Route $router */
$router->get('posts/create', [
    'as' => 'web_post_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
