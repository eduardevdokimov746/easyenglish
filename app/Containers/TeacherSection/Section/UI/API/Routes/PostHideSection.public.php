<?php

$router->post('api/teacher/section/hide', [
    'uses' => 'Controller@hide',
    'as' => 'api_teacher_section_hide'
]);
