<?php

/** @var Route $router */
$router->get('teacher/courses/zadanies', [
    'as' => 'web_teacher_courses_zadanies',
    'uses'  => 'Controller@zadanies',

]);
