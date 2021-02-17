<?php

/**
 * @apiGroup           Zadanie
 * @apiName            createZadanie
 *
 * @api                {POST} /v1/zadanies Endpoint title here..
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
$router->post('zadanies', [
    'as' => 'api_zadanie_create_zadanie',
    'uses'  => 'Controller@createZadanie',
    'middleware' => [
      'auth:api',
    ],
]);
