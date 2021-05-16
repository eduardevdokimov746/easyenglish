<?php

$router->post('chat/check-messages', [
    'uses' => 'Controller@checkedMessages',
    'as' => 'web_chat_check_messages'
]);
