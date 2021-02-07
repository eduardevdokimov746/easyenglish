<?php

/** @var Route $router */
$router->get('users/{name}', 'Controller@show')->name('users.show');
