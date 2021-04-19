<?php

$router->post('api/admin/users/search',[
    'uses' => 'Controller@search',
    'as' => 'api_admin_users_search'
]);