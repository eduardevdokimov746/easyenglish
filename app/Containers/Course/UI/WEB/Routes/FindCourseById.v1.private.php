<?php

/** @var Route $router */
$router->get('courses/{id}', [
    'as' => 'web_course_show',
    'uses'  => 'Controller@show',
]);
