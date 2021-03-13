<?php

/**
 * @apiGroup           Auth
 * @apiName            createAuth
 *
 * @api                {POST} /v1/auths Endpoint title here..
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
$router->post('auths', [
    'as' => 'api_auth_create_auth',
    'uses'  => 'Controller@createAuth',
    'middleware' => [
      'auth:api',
    ],
]);
