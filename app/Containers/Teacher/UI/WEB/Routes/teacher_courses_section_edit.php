<?php

/** @var Route $router */
$router->get('teacher/courses/section/{id}/edit', [
    'as' => 'teacher_courses_section_edit',
    'uses'  => 'CourseController@edit',
]);
