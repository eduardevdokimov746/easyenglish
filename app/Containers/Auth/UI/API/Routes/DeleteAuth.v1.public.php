<?php

/**
 * @apiGroup           Auth
 * @apiName            deleteAuth
 *
 * @api                {DELETE} /v1/auths/:id Endpoint title here..
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
$router->delete('auths/{id}', [
    'as' => 'api_auth_delete_auth',
    'uses'  => 'Controller@deleteAuth',
    'middleware' => [
      'auth:api',
    ],
]);
