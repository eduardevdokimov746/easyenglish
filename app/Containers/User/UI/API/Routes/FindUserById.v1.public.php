<?php

/**
 * @apiGroup           User
 * @apiName            findUserById
 *
 * @api                {GET} /v1/users/:id Endpoint title here..
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
$router->get('users/{id}', [
    'as' => 'api_user_find_user_by_id',
    'uses'  => 'Controller@findUserById',
    'middleware' => [
      'auth:api',
    ],
]);
