<?php

/**
 * @apiGroup           Course
 * @apiName            deleteCourse
 *
 * @api                {DELETE} /v1/courses/:id Endpoint title here..
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
$router->delete('courses/{id}', [
    'as' => 'api_course_delete_course',
    'uses'  => 'Controller@deleteCourse',
    'middleware' => [
      'auth:api',
    ],
]);
