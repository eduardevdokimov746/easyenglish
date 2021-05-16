<?php

$router->get('response_student/file/{hash}/download', [
    'uses' => 'Controller@fileDownload',
    'as' => 'web_response_student_file_download',
    'middleware' => 'auth'
]);
