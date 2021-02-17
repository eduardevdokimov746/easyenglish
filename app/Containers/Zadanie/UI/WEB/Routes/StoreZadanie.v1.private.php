<?php

/** @var Route $router */
$router->post('zadanies/store', [
    'as' => 'web_zadanie_store',
    'uses'  => 'Controller@store',
]);
