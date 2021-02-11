<?php

/** @var Route $router */
$router->get('chats/{id}', [
    'as' => 'web_chat_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
