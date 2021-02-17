<?php

/**
 * @apiGroup           Practice
 * @apiName            getAllPractices
 *
 * @api                {GET} /v1/practices Endpoint title here..
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
$router->get('practices', [
    'as' => 'api_practice_get_all_practices',
    'uses'  => 'Controller@getAllPractices',
    'middleware' => [
      'auth:api',
    ],
]);
