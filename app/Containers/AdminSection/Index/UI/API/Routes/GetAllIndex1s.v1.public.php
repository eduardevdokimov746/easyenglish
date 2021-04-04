<?php

/**
 * @apiGroup           Index1
 * @apiName            getAllIndex1s
 *
 * @api                {GET} /v1/index1s Endpoint title here..
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
$router->get('index1s', [
    'as' => 'api_index1_get_all_index1s',
    'uses'  => 'Controller@getAllIndex1s',
    'middleware' => [
      'auth:api',
    ],
]);
