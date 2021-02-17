<?php

/**
 * @apiGroup           Teacher
 * @apiName            findTeacherById
 *
 * @api                {GET} /v1/teachers/:id Endpoint title here..
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
$router->get('teachers/{id}', [
    'as' => 'api_teacher_find_teacher_by_id',
    'uses'  => 'Controller@findTeacherById',
    'middleware' => [
      'auth:api',
    ],
]);
