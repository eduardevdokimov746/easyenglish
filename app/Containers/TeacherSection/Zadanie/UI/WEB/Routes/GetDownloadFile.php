<?php

$router->get('zadanie/file/{hash}/download', [
    'uses' => 'Controller@fileDownload',
    'as' => 'web_zadanie_file_download'
]);
