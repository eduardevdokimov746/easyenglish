<?php

/**
 * @apiGroup           Auth
 * @apiName            updateAuth
 *
 * @api                {PATCH} /v1/auths/:id Endpoint title here..
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
$router->patch('auths/{id}', [
    'as' => 'api_auth_update_auth',
    'uses'  => 'Controller@updateAuth',
    'middleware' => [
      'auth:api',
    ],
]);
