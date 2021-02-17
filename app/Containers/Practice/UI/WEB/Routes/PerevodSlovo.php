<?php

/** @var Route $router */
$router->get('practices/perevod_slovo', [
    'as' => 'web_practice_perevod_slovo',
    'uses'  => 'Controller@perevodSlovo',
]);
