<?php

$router->post('material/deleteFromMy', [
    'uses' => 'Controller@deleteFromMy',
    'as' => 'web_materials_delete_from_my',
    'middleware' => 'auth'
]);
