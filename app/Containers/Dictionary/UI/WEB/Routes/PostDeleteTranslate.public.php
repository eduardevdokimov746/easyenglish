<?php

$router->post('word/delete-translate', [
    'uses' => 'Controller@deleteTranslate',
    'as' => 'web_word_delete_translate',
    'middleware' => 'auth'
]);
