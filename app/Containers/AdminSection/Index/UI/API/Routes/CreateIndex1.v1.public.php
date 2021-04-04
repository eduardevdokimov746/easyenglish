<?php

/**
 * @apiGroup           Index1
 * @apiName            createIndex1
 *
 * @api                {POST} /v1/index1s Endpoint title here..
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
$router->post('index1s', [
    'as' => 'api_index1_create_index1',
    'uses'  => 'Controller@createIndex1',
    'middleware' => [
      'auth:api',
    ],
]);
