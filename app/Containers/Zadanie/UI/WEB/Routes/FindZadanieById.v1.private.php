<?php

/** @var Route $router */
$router->get('zadanies/{id}', [
    'as' => 'web_zadanie_show',
    'uses'  => 'Controller@show',
]);
