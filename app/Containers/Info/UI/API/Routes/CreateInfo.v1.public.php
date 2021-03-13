<?php

/**
 * @apiGroup           Info
 * @apiName            createInfo
 *
 * @api                {POST} /v1/infos Endpoint title here..
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
$router->post('infos', [
    'as' => 'api_info_create_info',
    'uses'  => 'Controller@createInfo',
    'middleware' => [
      'auth:api',
    ],
]);
