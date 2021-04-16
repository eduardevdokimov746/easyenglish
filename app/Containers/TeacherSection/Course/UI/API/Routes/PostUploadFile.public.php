<?php

$router->post('api/teacher/courses/uploadFile', [
    'uses' => 'Controller@uploadFile',
    'as' => 'api_teacher_courses_upload_file'
]);
