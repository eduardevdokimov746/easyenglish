<?php

$router->post('word/find', [
    'uses' => 'Controller@getWord',
    'as' => 'web_word_show',
    'middleware' => 'auth'
]);
