<?php

/**
 * @apiGroup           Index
 * @apiName            findIndexById
 *
 * @api                {GET} /v1/indices/:id Endpoint title here..
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
$router->get('indices/{id}', [
    'as' => 'api_index_find_index_by_id',
    'uses'  => 'Controller@findIndexById',
    'middleware' => [
      'auth:api',
    ],
]);
