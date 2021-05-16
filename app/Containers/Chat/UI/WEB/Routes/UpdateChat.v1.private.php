<?php

/** @var Route $router */
$router->patch('chats/{id}', [
    'as' => 'web_chat_update',
    'uses'  => 'Controller@update',

]);
