<?php

$router->get('logout', [
    'uses' => 'LoginController@logout',
    'as' => 'web_logout',
    'middleware' => 'auth'
]);
