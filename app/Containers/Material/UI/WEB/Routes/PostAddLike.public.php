<?php

$router->post('material/addLike', [
    'uses' => 'Controller@addLike',
    'as' => 'web_materials_add_like',
    'middleware' => 'auth'
]);
