<?php

$router->post('api/teacher/course/hide', [
    'uses' => 'Controller@hide',
    'as' => 'api_teacher_course_hide'
]);