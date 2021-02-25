<?php

/**
 * @apiGroup           ResponseTeacher
 * @apiName            createResponseTeacher
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
    'as' => 'api_responseteacher_create_response_teacher',
    'uses'  => 'Controller@createResponseTeacher',
    'middleware' => [
      'auth:api',
    ],
]);
