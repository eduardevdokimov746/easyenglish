<?php

$router->post('chat/send-message', [
    'uses' => 'Controller@sendMessage',
    'as' => 'web_chat_send_message'
]);
