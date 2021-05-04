<?php

$router->post('api/teacher/sections/getSectionsFromCourse', [
    'uses' => 'Controller@getAllSectionFromCourse',
    'as' => 'api_teacher_sections_get_sections_from_course'
]);
