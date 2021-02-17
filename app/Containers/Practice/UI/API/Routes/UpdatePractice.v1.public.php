<?php

/**
 * @apiGroup           Practice
 * @apiName            updatePractice
 *
 * @api                {PATCH} /v1/practices/:id Endpoint title here..
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
$router->patch('practices/{id}', [
    'as' => 'api_practice_update_practice',
    'uses'  => 'Controller@updatePractice',
    'middleware' => [
      'auth:api',
    ],
]);
