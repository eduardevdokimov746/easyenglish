<?php

/** @var Route $router */
$router->get('posts', [
    'as' => 'web_post_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
