<?php

/**
 * @apiGroup           Teacher
 * @apiName            deleteTeacher
 *
 * @api                {DELETE} /v1/teachers/:id Endpoint title here..
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
$router->delete('teachers/{id}', [
    'as' => 'api_teacher_delete_teacher',
    'uses'  => 'Controller@deleteTeacher',
    'middleware' => [
      'auth:api',
    ],
]);
