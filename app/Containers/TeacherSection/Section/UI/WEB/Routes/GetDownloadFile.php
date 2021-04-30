<?php

$router->get('section/file/{hash}/download', [
    'uses' => 'Controller@fileDownload',
    'as' => 'web_section_file_download'
]);
