<?php

/** @var Route $router */
$router->get('chats/create', [
    'as' => 'web_chat_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
