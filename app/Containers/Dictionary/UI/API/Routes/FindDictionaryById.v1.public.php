<?php

/**
 * @apiGroup           Dictionary
 * @apiName            findDictionaryById
 *
 * @api                {GET} /v1/dictionary/:id Endpoint title here..
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
$router->get('dictionary/{id}', [
    'as' => 'api_dictionary_find_dictionary_by_id',
    'uses'  => 'Controller@findDictionaryById',
    'middleware' => [
      'auth:api',
    ],
]);
