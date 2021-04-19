<?php

$router->post('api/teacher/courses/delete', [
    'uses' => 'Controller@delete',
    'as' => 'api_teacher_courses_delete'
]);