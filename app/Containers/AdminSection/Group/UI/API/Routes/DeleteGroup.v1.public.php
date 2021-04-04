<?php

/**
 * @apiGroup           Group
 * @apiName            deleteGroup
 *
 * @api                {DELETE} /v1/groups/:id Endpoint title here..
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
$router->delete('groups/{id}', [
    'as' => 'api_group_delete_group',
    'uses'  => 'Controller@deleteGroup',
    'middleware' => [
      'auth:api',
    ],
]);
