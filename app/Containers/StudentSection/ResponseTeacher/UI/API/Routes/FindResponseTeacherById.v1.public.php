<?php

/**
 * @apiGroup           ResponseTeacher
 * @apiName            findResponseTeacherById
 *
 * @api                {GET} /v1/responses/:id Endpoint title here..
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
$router->get('responses/{id}', [
    'as' => 'api_responseteacher_find_response_teacher_by_id',
    'uses'  => 'Controller@findResponseTeacherById',
    'middleware' => [
      'auth:api',
    ],
]);
