<?php

/**
 * @apiGroup           Chat
 * @apiName            deleteChat
 *
 * @api                {DELETE} /v1/chats/:id Endpoint title here..
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
$router->delete('chats/{id}', [
    'as' => 'api_chat_delete_chat',
    'uses'  => 'Controller@deleteChat',
    'middleware' => [
      'auth:api',
    ],
]);
