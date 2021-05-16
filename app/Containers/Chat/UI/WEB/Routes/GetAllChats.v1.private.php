<?php

/** @var Route $router */
$router->post('chats', [
    'as' => 'web_chat_index',
    'uses'  => 'Controller@index',
]);
