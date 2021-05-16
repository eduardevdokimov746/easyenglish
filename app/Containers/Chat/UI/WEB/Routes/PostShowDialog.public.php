<?php

$router->post('chat/show-dialog', [
    'uses' => 'Controller@showDialog',
    'as' => 'web_chat_show_dialog'
]);
