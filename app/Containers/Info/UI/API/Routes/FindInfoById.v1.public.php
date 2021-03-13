<?php

/**
 * @apiGroup           Info
 * @apiName            findInfoById
 *
 * @api                {GET} /v1/infos/:id Endpoint title here..
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
$router->get('infos/{id}', [
    'as' => 'api_info_find_info_by_id',
    'uses'  => 'Controller@findInfoById',
    'middleware' => [
      'auth:api',
    ],
]);
