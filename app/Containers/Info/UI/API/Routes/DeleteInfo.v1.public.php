<?php

/**
 * @apiGroup           Info
 * @apiName            deleteInfo
 *
 * @api                {DELETE} /v1/infos/:id Endpoint title here..
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
$router->delete('infos/{id}', [
    'as' => 'api_info_delete_info',
    'uses'  => 'Controller@deleteInfo',
    'middleware' => [
      'auth:api',
    ],
]);
