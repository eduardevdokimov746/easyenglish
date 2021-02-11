<?php

/**
 * @apiGroup           Material
 * @apiName            getAllMaterials
 *
 * @api                {GET} /v1/materials Endpoint title here..
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
$router->get('materials', [
    'as' => 'api_material_get_all_materials',
    'uses'  => 'Controller@getAllMaterials',
    'middleware' => [
      'auth:api',
    ],
]);
