<?php

/**
 * @apiGroup           ResponseTeacher
 * @apiName            getAllResponseTeachers
 *
 * @api                {GET} /v1/responses Endpoint title here..
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
$router->get('responses', [
    'as' => 'api_responseteacher_get_all_response_teachers',
    'uses'  => 'Controller@getAllResponseTeachers',
    'middleware' => [
      'auth:api',
    ],
]);
