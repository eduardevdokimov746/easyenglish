<?php

/** @var Route $router */
$router->get('chats/{id}/edit', [
    'as' => 'web_chat_edit',
    'uses'  => 'Controller@edit',

]);
