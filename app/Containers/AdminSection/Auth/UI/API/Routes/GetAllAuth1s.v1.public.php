<?php

/**
 * @apiGroup           Auth1
 * @apiName            getAllAuth1s
 *
 * @api                {GET} /v1/auth1s Endpoint title here..
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
$router->get('auth1s', [
    'as' => 'api_auth1_get_all_auth1s',
    'uses'  => 'Controller@getAllAuth1s',
    'middleware' => [
      'auth:api',
    ],
]);
