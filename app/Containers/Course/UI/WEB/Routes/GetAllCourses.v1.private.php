<?php

/** @var Route $router */
$router->get('courses', [
    'as' => 'web_course_index',
    'uses'  => 'Controller@index',
]);
