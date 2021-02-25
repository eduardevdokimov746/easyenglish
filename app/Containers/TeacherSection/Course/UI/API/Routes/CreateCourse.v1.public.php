<?php

/**
 * @apiGroup           Course
 * @apiName            createCourse
 *
 * @api                {POST} /v1/1 Endpoint title here..
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
$router->post('1', [
    'as' => 'api_course_create_course',
    'uses'  => 'Controller@createCourse',
    'middleware' => [
      'auth:api',
    ],
]);
