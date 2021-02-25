<?php

/**
 * @apiGroup           ResponseTeacher
 * @apiName            updateResponseTeacher
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
    'as' => 'api_responseteacher_update_response_teacher',
    'uses'  => 'Controller@updateResponseTeacher',
    'middleware' => [
      'auth:api',
    ],
]);
