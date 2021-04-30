<?php

$router->post('api/admin/groups/search', [
    'uses' => 'Controller@search',
    'as' => 'api_admin_groups_search'
]);
