<?php

/**
 * @apiGroup           User1
 * @apiName            deleteUser1
 *
 * @api                {DELETE} /v1/user1s/:id Endpoint title here..
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
$router->delete('user1s/{id}', [
    'as' => 'api_user1_delete_user1',
    'uses'  => 'Controller@deleteUser1',
    'middleware' => [
      'auth:api',
    ],
]);
