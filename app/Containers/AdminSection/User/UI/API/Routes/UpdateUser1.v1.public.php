<?php

/**
 * @apiGroup           User1
 * @apiName            updateUser1
 *
 * @api                {PATCH} /v1/user1s/:id Endpoint title here..
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
$router->patch('user1s/{id}', [
    'as' => 'api_user1_update_user1',
    'uses'  => 'Controller@updateUser1',
    'middleware' => [
      'auth:api',
    ],
]);
