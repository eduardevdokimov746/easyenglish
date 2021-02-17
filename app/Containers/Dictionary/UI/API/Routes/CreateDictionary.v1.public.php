<?php

/**
 * @apiGroup           Dictionary
 * @apiName            createDictionary
 *
 * @api                {POST} /v1/dictionary Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('dictionary', [
    'as' => 'api_dictionary_create_dictionary',
    'uses'  => 'Controller@createDictionary',
    'middleware' => [
      'auth:api',
    ],
]);
