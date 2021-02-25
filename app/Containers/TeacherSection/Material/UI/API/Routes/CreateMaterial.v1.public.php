<?php

/**
 * @apiGroup           Material
 * @apiName            createMaterial
 *
 * @api                {POST} /v1/materials Endpoint title here..
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
$router->post('materials', [
    'as' => 'api_material_create_material',
    'uses'  => 'Controller@createMaterial',
    'middleware' => [
      'auth:api',
    ],
]);
