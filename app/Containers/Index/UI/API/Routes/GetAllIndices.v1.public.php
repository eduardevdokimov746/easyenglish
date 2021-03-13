<?php

/**
 * @apiGroup           Index
 * @apiName            getAllIndices
 *
 * @api                {GET} /v1/indices Endpoint title here..
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
$router->get('indices', [
    'as' => 'api_index_get_all_indices',
    'uses'  => 'Controller@getAllIndices',
    'middleware' => [
      'auth:api',
    ],
]);
