<?php

/**
 * @apiGroup           Group
 * @apiName            updateGroup
 *
 * @api                {PATCH} /v1/groups/:id Endpoint title here..
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
$router->patch('groups/{id}', [
    'as' => 'api_group_update_group',
    'uses'  => 'Controller@updateGroup',
    'middleware' => [
      'auth:api',
    ],
]);
