<?php

$router->post('api/admin/students/search', [
    'uses' => 'Controller@searchStudents',
    'as' => 'api_admin_students_search'
]);
