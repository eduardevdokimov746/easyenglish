<?php

/** @var Route $router */
$router->get('faq', [
    'as' => 'web_cite_faq',
    'uses'  => 'Controller@faq',
]);
