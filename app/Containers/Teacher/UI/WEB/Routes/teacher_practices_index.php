<?php

/** @var Route $router */
$router->get('teacher/practices', [
    'as' => 'web_teacher_practices_index',
    'uses'  => 'PracticeController@index',
]);
