<?php

/** @var Route $router */
$router->post('teacher/student-response/{id}/responses/store', [
    'as' => 'web_teacher_responses_store',
    'uses'  => 'Controller@store',
    'middleware' => 'auth'
]);
