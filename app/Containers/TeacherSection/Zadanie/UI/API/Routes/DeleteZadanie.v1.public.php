<?php

/**
 * @apiGroup           Zadanie
 * @apiName            deleteZadanie
 *
 * @api                {DELETE} /v1/zadanies/:id Endpoint title here..
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
$router->delete('zadanies/{id}', [
    'as' => 'api_zadanie_delete_zadanie',
    'uses'  => 'Controller@deleteZadanie',
    'middleware' => [
      'auth:api',
    ],
]);
