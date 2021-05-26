<?php

$router->post('material/addDislike', [
    'uses' => 'Controller@addDislike',
    'as' => 'web_materials_add_dislike',
    'middleware' => 'auth'
]);
