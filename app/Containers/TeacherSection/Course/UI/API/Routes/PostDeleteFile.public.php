<?php

$router->post('api/teacher/courses/deleteFile', [
    'uses' => 'Controller@deleteFile',
    'as' => 'api_teacher_courses_delete_file'
]);
