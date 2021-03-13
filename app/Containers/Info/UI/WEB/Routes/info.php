<?php

/** @var Route $router */
$router->get('info', [
    'as' => 'web_cite_info',
    'uses'  => 'Controller@info',
]);
