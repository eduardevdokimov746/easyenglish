<?php

/**
 * @apiGroup           Course
 * @apiName            updateCourse
 *
 * @api                {PATCH} /v1/courses/:id Endpoint title here..
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
$router->patch('courses/{id}', [
    'as' => 'api_course_update_course',
    'uses'  => 'Controller@updateCourse',
    'middleware' => [
      'auth:api',
    ],
]);
