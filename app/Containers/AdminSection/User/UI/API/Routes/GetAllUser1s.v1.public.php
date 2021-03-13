<?php

/**
 * @apiGroup           User1
 * @apiName            getAllUser1s
 *
 * @api                {GET} /v1/user1s Endpoint title here..
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
$router->get('user1s', [
    'as' => 'api_user1_get_all_user1s',
    'uses'  => 'Controller@getAllUser1s',
    'middleware' => [
      'auth:api',
    ],
]);
