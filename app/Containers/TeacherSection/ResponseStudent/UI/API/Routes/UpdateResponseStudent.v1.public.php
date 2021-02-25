<?php

/**
 * @apiGroup           ResponseStudent
 * @apiName            updateResponseStudent
 *
 * @api                {PATCH} /v1/responses/:id Endpoint title here..
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
$router->patch('responses/{id}', [
    'as' => 'api_responsestudent_update_response_student',
    'uses'  => 'Controller@updateResponseStudent',
    'middleware' => [
      'auth:api',
    ],
]);
