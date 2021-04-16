<?php

/** @var Route $router */
$router->get('practices/slovo_perevod', [
    'as' => 'web_practice_slovo_perevod',
    'uses'  => 'Controller@slovoPerevod',
    'middleware' => 'auth'
]);
