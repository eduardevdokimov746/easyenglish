<?php

/**
 * @apiGroup           Zadanie
 * @apiName            findZadanieById
 *
 * @api                {GET} /v1/zadanies/:id Endpoint title here..
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
$router->get('zadanies/{id}', [
    'as' => 'api_zadanie_find_zadanie_by_id',
    'uses'  => 'Controller@findZadanieById',
    'middleware' => [
      'auth:api',
    ],
]);
