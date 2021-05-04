<?php

$router->post('api/teacher/course/{id}/updateTitle', [
    'uses' => 'Controller@updateTitle',
    'as' => 'api_teacher_courses_update_title'
]);
