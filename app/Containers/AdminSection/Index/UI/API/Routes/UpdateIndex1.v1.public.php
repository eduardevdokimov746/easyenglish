<?php

/**
 * @apiGroup           Index1
 * @apiName            updateIndex1
 *
 * @api                {PATCH} /v1/index1s/:id Endpoint title here..
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
$router->patch('index1s/{id}', [
    'as' => 'api_index1_update_index1',
    'uses'  => 'Controller@updateIndex1',
    'middleware' => [
      'auth:api',
    ],
]);
