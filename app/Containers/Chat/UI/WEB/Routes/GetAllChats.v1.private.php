<?php

/** @var Route $router */
$router->get('chats', [
    'as' => 'web_chat_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
