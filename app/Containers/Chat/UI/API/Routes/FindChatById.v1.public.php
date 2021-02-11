<?php

/**
 * @apiGroup           Chat
 * @apiName            findChatById
 *
 * @api                {GET} /v1/chats/:id Endpoint title here..
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
$router->get('chats/{id}', [
    'as' => 'api_chat_find_chat_by_id',
    'uses'  => 'Controller@findChatById',
    'middleware' => [
      'auth:api',
    ],
]);
