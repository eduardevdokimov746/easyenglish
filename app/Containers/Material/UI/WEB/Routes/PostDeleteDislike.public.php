<?php

$router->post('material/deleteDislike', [
    'uses' => 'Controller@deleteDislike',
    'as' => 'web_materials_delete_dislike',
    'middleware' => 'auth'
]);
