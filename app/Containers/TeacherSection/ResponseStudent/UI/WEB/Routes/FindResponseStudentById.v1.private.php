<?php

/** @var Route $router */
$router->get('teacher/zadanies/{zadanie}/responses-students/{id}', [
    'as' => 'web_teacher_responses_students_show',
    'uses'  => 'Controller@show',
]);
