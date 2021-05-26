<?php

$router->post('material/deleteLike', [
    'uses' => 'Controller@deleteLike',
    'as' => 'web_materials_delete_like',
    'middleware' => 'auth'
]);
