<?php

/**
 * @apiGroup           Zadanie
 * @apiName            getAllZadanies
 *
 * @api                {GET} /v1/zadanies Endpoint title here..
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
$router->get('zadanies', [
    'as' => 'api_zadanie_get_all_zadanies',
    'uses'  => 'Controller@getAllZadanies',
    'middleware' => [
      'auth:api',
    ],
]);
