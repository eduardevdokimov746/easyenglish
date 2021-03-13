<?php

/**
 * @apiGroup           Auth
 * @apiName            findAuthById
 *
 * @api                {GET} /v1/auths/:id Endpoint title here..
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
$router->get('auths/{id}', [
    'as' => 'api_auth_find_auth_by_id',
    'uses'  => 'Controller@findAuthById',
    'middleware' => [
      'auth:api',
    ],
]);
