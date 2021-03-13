<?php

/**
 * @apiGroup           User1
 * @apiName            findUser1ById
 *
 * @api                {GET} /v1/user1s/:id Endpoint title here..
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
$router->get('user1s/{id}', [
    'as' => 'api_user1_find_user1_by_id',
    'uses'  => 'Controller@findUser1ById',
    'middleware' => [
      'auth:api',
    ],
]);
