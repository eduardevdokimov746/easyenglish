<?php

$router->post('word/new-translate', [
    'uses' => 'Controller@addNewTranslate',
    'as' => 'web_word_add_new_translate',
    'middleware' => 'auth'
]);
