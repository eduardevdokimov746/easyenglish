<?php

$router->get('faq/{slug}', [
    'as' => 'web_faq_show',
    'uses' => 'Controller@show'
]);
