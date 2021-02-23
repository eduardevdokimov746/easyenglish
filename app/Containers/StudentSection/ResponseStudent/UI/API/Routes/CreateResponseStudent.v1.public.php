<?php

/**
 * @apiGroup           ResponseStudent
 * @apiName            createResponseStudent
 *
 * @api                {POST} /v1/responses Endpoint title here..
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
$router->post('responses', [
    'as' => 'api_responsestudent_create_response_student',
    'uses'  => 'Controller@createResponseStudent',
    'middleware' => [
      'auth:api',
    ],
]);
