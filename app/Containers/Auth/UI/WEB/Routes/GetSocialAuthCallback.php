<?php

$router->get('auth/{provider}/callback', [
    'uses' => 'SocialController@callback',
    'middleware' => 'guest'
]);
