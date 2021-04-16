<?php

/** @var Route $router */
$router->get('practices/povtor', [
    'as' => 'web_practice_povtor',
    'uses'  => 'Controller@povtor',
    'middleware' => 'auth'
]);
