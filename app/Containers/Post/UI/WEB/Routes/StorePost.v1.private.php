<?php

/** @var Route $router */
$router->post('posts/store', [
    'as' => 'web_post_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
