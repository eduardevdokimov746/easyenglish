<?php

$router->get('teacher/courses/{id}/visible', [
    'uses' => 'Controller@visible',
    'as' => 'web_teacher_courses_visible',
    'middleware' => 'auth'
]);