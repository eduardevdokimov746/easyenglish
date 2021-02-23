<?php

/**
 * @apiGroup           Section
 * @apiName            updateSection
 *
 * @api                {PATCH} /v1/sections/:id Endpoint title here..
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
$router->patch('sections/{id}', [
    'as' => 'api_section_update_section',
    'uses'  => 'Controller@updateSection',
    'middleware' => [
      'auth:api',
    ],
]);
