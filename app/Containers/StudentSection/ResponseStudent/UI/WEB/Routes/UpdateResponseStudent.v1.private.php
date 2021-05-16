<?php

/** @var Route $router */
$router->post('student/responses/{id}/update', [
    'as' => 'web_student_responses_update',
    'uses'  => 'Controller@update',
    'middleware' => 'auth',
]);
