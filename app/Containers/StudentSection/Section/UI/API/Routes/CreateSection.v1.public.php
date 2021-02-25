<?php

/**
 * @apiGroup           Section
 * @apiName            createSection
 *
 * @api                {POST} /v1/sections Endpoint title here..
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
$router->post('sections', [
    'as' => 'api_section_create_section',
    'uses'  => 'Controller@createSection',
    'middleware' => [
      'auth:api',
    ],
]);
