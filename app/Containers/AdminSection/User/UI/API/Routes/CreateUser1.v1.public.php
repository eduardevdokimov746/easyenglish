<?php

/**
 * @apiGroup           User1
 * @apiName            createUser1
 *
 * @api                {POST} /v1/user1s Endpoint title here..
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
$router->post('user1s', [
    'as' => 'api_user1_create_user1',
    'uses'  => 'Controller@createUser1',
    'middleware' => [
      'auth:api',
    ],
]);
