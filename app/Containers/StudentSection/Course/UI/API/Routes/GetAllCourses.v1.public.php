<?php

/**
 * @apiGroup           Course
 * @apiName            getAllCourses
 *
 * @api                {GET} /v1/courses Endpoint title here..
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
$router->get('courses', [
    'as' => 'api_course_get_all_courses',
    'uses'  => 'Controller@getAllCourses',
    'middleware' => [
      'auth:api',
    ],
]);
