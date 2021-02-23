<?php

/**
 * @apiGroup           Course
 * @apiName            findCourseById
 *
 * @api                {GET} /v1/1/:id Endpoint title here..
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
$router->get('1/{id}', [
    'as' => 'api_course_find_course_by_id',
    'uses'  => 'Controller@findCourseById',
    'middleware' => [
      'auth:api',
    ],
]);
