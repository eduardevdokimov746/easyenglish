<?php

/**
 * @apiGroup           Material
 * @apiName            deleteMaterial
 *
 * @api                {DELETE} /v1/materials/:id Endpoint title here..
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
$router->delete('materials/{id}', [
    'as' => 'api_material_delete_material',
    'uses'  => 'Controller@deleteMaterial',
    'middleware' => [
      'auth:api',
    ],
]);
