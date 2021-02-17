<?php

/**
 * @apiGroup           Practice
 * @apiName            createPractice
 *
 * @api                {POST} /v1/practices Endpoint title here..
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
$router->post('practices', [
    'as' => 'api_practice_create_practice',
    'uses'  => 'Controller@createPractice',
    'middleware' => [
      'auth:api',
    ],
]);
