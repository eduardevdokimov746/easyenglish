<?php

$router->post('material/addToMy', [
    'uses' => 'Controller@addToMy',
    'as' => 'web_materials_add_to_my',
    'middleware' => 'auth'
]);
