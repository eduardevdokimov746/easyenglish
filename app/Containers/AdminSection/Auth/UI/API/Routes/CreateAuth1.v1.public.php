<?php

/**
 * @apiGroup           Auth1
 * @apiName            createAuth1
 *
 * @api                {POST} /v1/auth1s Endpoint title here..
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
$router->post('auth1s', [
    'as' => 'api_auth1_create_auth1',
    'uses'  => 'Controller@createAuth1',
    'middleware' => [
      'auth:api',
    ],
]);
