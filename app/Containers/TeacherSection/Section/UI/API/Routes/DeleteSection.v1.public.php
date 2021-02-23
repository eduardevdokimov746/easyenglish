<?php

/**
 * @apiGroup           Section
 * @apiName            deleteSection
 *
 * @api                {DELETE} /v1/sections/:id Endpoint title here..
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
$router->delete('sections/{id}', [
    'as' => 'api_section_delete_section',
    'uses'  => 'Controller@deleteSection',
    'middleware' => [
      'auth:api',
    ],
]);
