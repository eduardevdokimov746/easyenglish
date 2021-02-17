<?php

/**
 * @apiGroup           Teacher
 * @apiName            updateTeacher
 *
 * @api                {PATCH} /v1/teachers/:id Endpoint title here..
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
$router->patch('teachers/{id}', [
    'as' => 'api_teacher_update_teacher',
    'uses'  => 'Controller@updateTeacher',
    'middleware' => [
      'auth:api',
    ],
]);
