<?php

/** @var Route $router */
$router->delete('chats/{id}', [
    'as' => 'web_chat_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
