<?php

/** @var Route $router */
$router->get('practices/create', [
    'as' => 'web_practice_create',
    'uses'  => 'Controller@create',
]);
