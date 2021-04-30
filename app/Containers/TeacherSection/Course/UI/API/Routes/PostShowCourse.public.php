<?php

$router->post('api/teacher/course/show', [
    'uses' => 'Controller@show',
    'as' => 'api_teacher_course_show'
]);