<?php

/**
 * @apiGroup           Group
 * @apiName            findGroupById
 *
 * @api                {GET} /v1/groups/:id Endpoint title here..
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
$router->get('groups/{id}', [
    'as' => 'api_group_find_group_by_id',
    'uses'  => 'Controller@findGroupById',
    'middleware' => [
      'auth:api',
    ],
]);
