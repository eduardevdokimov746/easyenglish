<?php

$router->post('api/admin/groups/checkuniquetitle', [
    'uses' => 'Controller@checkUniqueTitle',
    'as' => 'api_admin_groups_check_unique_title'
]);
