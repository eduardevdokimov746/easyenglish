<?php

/**
 * @apiGroup           Info
 * @apiName            getAllInfos
 *
 * @api                {GET} /v1/infos Endpoint title here..
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
$router->get('infos', [
    'as' => 'api_info_get_all_infos',
    'uses'  => 'Controller@getAllInfos',
    'middleware' => [
      'auth:api',
    ],
]);
