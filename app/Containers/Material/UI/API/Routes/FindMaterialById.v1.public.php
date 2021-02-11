<?php

/**
 * @apiGroup           Material
 * @apiName            findMaterialById
 *
 * @api                {GET} /v1/materials/:id Endpoint title here..
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
$router->get('materials/{id}', [
    'as' => 'api_material_find_material_by_id',
    'uses'  => 'Controller@findMaterialById',
    'middleware' => [
      'auth:api',
    ],
]);
