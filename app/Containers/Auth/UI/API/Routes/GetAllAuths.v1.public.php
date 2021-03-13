<?php

/**
 * @apiGroup           Auth
 * @apiName            getAllAuths
 *
 * @api                {GET} /v1/auths Endpoint title here..
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
$router->get('auths', [
    'as' => 'api_auth_get_all_auths',
    'uses'  => 'Controller@getAllAuths',
    'middleware' => [
      'auth:api',
    ],
]);
