<?php

/** @var Route $router */
$router->delete('users/{id}', [
    'as' => 'web_user_delete',
    'uses'  => 'Controller@delete',
]);
