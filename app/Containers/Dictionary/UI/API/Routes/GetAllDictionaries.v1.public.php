<?php

/**
 * @apiGroup           Dictionary
 * @apiName            getAllDictionaries
 *
 * @api                {GET} /v1/dictionary Endpoint title here..
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
$router->get('dictionary', [
    'as' => 'api_dictionary_get_all_dictionaries',
    'uses'  => 'Controller@getAllDictionaries',
    'middleware' => [
      'auth:api',
    ],
]);
