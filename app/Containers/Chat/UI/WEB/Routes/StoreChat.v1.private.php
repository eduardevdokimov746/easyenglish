<?php

/** @var Route $router */
$router->post('chats/store', [
    'as' => 'web_chat_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
