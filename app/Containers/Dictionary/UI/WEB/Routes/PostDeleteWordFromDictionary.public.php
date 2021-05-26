<?php

$router->post('dictionary/delete', [
    'uses' => 'Controller@delete',
    'as' => 'web_dictionary_delete',
    'middleware' => 'auth'
]);
