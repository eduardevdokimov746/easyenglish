<?php

/**
 * @apiGroup           Auth1
 * @apiName            deleteAuth1
 *
 * @api                {DELETE} /v1/auth1s/:id Endpoint title here..
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
$router->delete('auth1s/{id}', [
    'as' => 'api_auth1_delete_auth1',
    'uses'  => 'Controller@deleteAuth1',
    'middleware' => [
      'auth:api',
    ],
]);
