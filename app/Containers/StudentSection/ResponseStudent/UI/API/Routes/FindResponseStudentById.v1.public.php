<?php

/**
 * @apiGroup           ResponseStudent
 * @apiName            findResponseStudentById
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
    'as' => 'api_responsestudent_find_response_student_by_id',
    'uses'  => 'Controller@findResponseStudentById',
    'middleware' => [
      'auth:api',
    ],
]);
