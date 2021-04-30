<?php

$router->get('teacher/courses/{id}/hide', [
    'uses' => 'Controller@hide',
    'as' => 'web_teacher_courses_hide',
    'middleware' => 'auth'
]);