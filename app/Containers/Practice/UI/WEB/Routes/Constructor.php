<?php

/** @var Route $router */
$router->get('practices/constructor', [
    'as' => 'web_practice_constructor',
    'uses'  => 'Controller@constructor',
]);
