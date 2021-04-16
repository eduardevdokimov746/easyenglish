<?php

$router->get('auth/{provider}', [
    'uses' => 'SocialController@redirect',
    'middleware' => 'guest',
    'as' => 'social-auth'
]);
