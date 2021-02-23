<?php

/** @var Route $router */
$router->post('student/zadanies/store', [
    'as' => 'web_student_zadanies_store',
    'uses'  => 'Controller@store',
]);
