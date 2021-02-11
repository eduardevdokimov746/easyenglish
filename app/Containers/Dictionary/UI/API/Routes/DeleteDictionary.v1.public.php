<?php

/**
 * @apiGroup           Dictionary
 * @apiName            deleteDictionary
 *
 * @api                {DELETE} /v1/dictionary/:id Endpoint title here..
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
$router->delete('dictionary/{id}', [
    'as' => 'api_dictionary_delete_dictionary',
    'uses'  => 'Controller@deleteDictionary',
    'middleware' => [
      'auth:api',
    ],
]);
