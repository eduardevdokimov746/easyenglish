<?php

/**
 * @apiGroup           User
 * @apiName            updateUser
 *
 * @api                {PATCH} /v1/users/:id Endpoint title here..
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
$router->patch('users/{id}', [
    'as' => 'api_user_update_user',
    'uses'  => 'Controller@updateUser',
    'middleware' => [
      'auth:api',
    ],
]);
