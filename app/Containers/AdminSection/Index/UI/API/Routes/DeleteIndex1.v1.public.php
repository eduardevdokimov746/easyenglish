<?php

/**
 * @apiGroup           Index1
 * @apiName            deleteIndex1
 *
 * @api                {DELETE} /v1/index1s/:id Endpoint title here..
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
$router->delete('index1s/{id}', [
    'as' => 'api_index1_delete_index1',
    'uses'  => 'Controller@deleteIndex1',
    'middleware' => [
      'auth:api',
    ],
]);
