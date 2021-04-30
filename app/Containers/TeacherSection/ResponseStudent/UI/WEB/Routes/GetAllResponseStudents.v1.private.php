<?php

/** @var Route $router */
$router->get('teacher/zadanies/{zadanie}/responses-students', [
    'as' => 'web_teacher_responses_students_index',
    'uses'  => 'Controller@index',
]);
