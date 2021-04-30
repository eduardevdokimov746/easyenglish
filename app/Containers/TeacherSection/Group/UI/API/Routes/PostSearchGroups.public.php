<?php

$router->post('api/teacher/groups/search', [
    'uses' => 'Controller@search',
    'as' => 'api_teacher_groups_search'
]);
