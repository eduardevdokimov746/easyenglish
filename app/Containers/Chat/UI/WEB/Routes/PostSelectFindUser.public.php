<?php

$router->post('chat/select-find-user', [
    'uses' => 'Controller@selectFindUser',
    'as' => 'web_chat_select_find_user'
]);
