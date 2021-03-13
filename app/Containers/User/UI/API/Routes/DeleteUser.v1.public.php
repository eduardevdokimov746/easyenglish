<?php

/**
 * @apiGroup           User
 * @apiName            deleteUser
 *
 * @api                {DELETE} /v1/users/:id Endpoint title here..
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
$router->delete('users/{id}', [
    'as' => 'api_user_delete_user',
    'uses'  => 'Controller@deleteUser',
    'middleware' => [
      'auth:api',
    ],
]);
