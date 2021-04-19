<?php

$router->get('/', [
    'as' => 'web_admin_index',
    'uses'  => 'Controller@index',
    'middleware' => 'admin'
]);
