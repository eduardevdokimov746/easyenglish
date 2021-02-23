<?php

/**
 * @apiGroup           Course
 * @apiName            updateCourse
 *
 * @api                {PATCH} /v1/1/:id Endpoint title here..
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
$router->patch('1/{id}', [
    'as' => 'api_course_update_course',
    'uses'  => 'Controller@updateCourse',
    'middleware' => [
      'auth:api',
    ],
]);
