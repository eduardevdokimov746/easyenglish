<?php

/**
 * @apiGroup           ResponseTeacher
 * @apiName            deleteResponseTeacher
 *
 * @api                {DELETE} /v1/responses/:id Endpoint title here..
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
$router->delete('responses/{id}', [
    'as' => 'api_responseteacher_delete_response_teacher',
    'uses'  => 'Controller@deleteResponseTeacher',
    'middleware' => [
      'auth:api',
    ],
]);
