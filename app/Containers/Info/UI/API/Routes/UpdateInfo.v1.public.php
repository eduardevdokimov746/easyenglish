<?php

/**
 * @apiGroup           Info
 * @apiName            updateInfo
 *
 * @api                {PATCH} /v1/infos/:id Endpoint title here..
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
$router->patch('infos/{id}', [
    'as' => 'api_info_update_info',
    'uses'  => 'Controller@updateInfo',
    'middleware' => [
      'auth:api',
    ],
]);
