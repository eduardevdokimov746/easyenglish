<?php

/** @var Route $router */
$router->post('teacher/student-response/{student_response}/responses/{teacher_response}/update', [
    'as' => 'web_teacher_responses_update',
    'uses'  => 'Controller@update',
    'middleware' => 'auth'
]);
