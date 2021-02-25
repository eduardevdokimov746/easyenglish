<?php

/**
 * @apiGroup           Material
 * @apiName            updateMaterial
 *
 * @api                {PATCH} /v1/materials/:id Endpoint title here..
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
$router->patch('materials/{id}', [
    'as' => 'api_material_update_material',
    'uses'  => 'Controller@updateMaterial',
    'middleware' => [
      'auth:api',
    ],
]);
