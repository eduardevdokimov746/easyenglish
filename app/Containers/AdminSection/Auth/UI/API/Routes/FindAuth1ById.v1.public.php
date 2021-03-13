<?php

/**
 * @apiGroup           Auth1
 * @apiName            findAuth1ById
 *
 * @api                {GET} /v1/auth1s/:id Endpoint title here..
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
$router->get('auth1s/{id}', [
    'as' => 'api_auth1_find_auth1_by_id',
    'uses'  => 'Controller@findAuth1ById',
    'middleware' => [
      'auth:api',
    ],
]);
