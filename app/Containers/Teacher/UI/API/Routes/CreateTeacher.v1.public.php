<?php

/**
 * @apiGroup           Teacher
 * @apiName            createTeacher
 *
 * @api                {POST} /v1/teachers Endpoint title here..
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
$router->post('teachers', [
    'as' => 'api_teacher_create_teacher',
    'uses'  => 'Controller@createTeacher',
    'middleware' => [
      'auth:api',
    ],
]);
