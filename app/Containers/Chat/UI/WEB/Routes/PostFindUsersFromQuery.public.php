<?php

$router->post('chat/find-users', [
    'uses' => 'Controller@findUsers',
    'as' => 'web_chat_find_users'
]);
