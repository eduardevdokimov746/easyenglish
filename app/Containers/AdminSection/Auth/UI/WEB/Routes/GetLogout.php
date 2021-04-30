<?php

$router->get('logout', [
    'uses' => 'LoginController@logout',
    'as' => 'web_admin_logout',
    'middleware' => 'admin'
]);