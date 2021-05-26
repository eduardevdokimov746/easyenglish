<?php

$router->post('dictionary/add', [
    'uses' => 'Controller@add',
    'as' => 'web_dictionary_add',
    'middleware' => 'auth'
]);
