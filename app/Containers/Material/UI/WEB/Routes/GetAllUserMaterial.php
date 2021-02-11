<?php

/** @var Route $router */
$router->get('materials/my', [
    'as' => 'web_material_my_index',
    'uses'  => 'Controller@my',
]);
