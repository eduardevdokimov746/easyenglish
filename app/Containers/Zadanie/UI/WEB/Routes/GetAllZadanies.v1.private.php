<?php

/** @var Route $router */
$router->get('zadanies', [
    'as' => 'web_zadanie_index',
    'uses'  => 'Controller@index',
]);
