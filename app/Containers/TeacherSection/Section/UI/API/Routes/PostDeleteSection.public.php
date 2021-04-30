<?php

$router->post('api/teacher/section/delete', [
    'uses' => 'Controller@delete',
    'as' => 'api_teacher_section_delete'
]);
