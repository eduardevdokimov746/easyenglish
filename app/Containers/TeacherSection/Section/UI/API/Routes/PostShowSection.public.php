<?php

$router->post('api/teacher/section/show', [
    'uses' => 'Controller@show',
    'as' => 'api_teacher_section_show'
]);
