<?php

/**
 * @apiGroup           Chat
 * @apiName            updateChat
 *
 * @api                {PATCH} /v1/chats/:id Endpoint title here..
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
$router->patch('chats/{id}', [
    'as' => 'api_chat_update_chat',
    'uses'  => 'Controller@updateChat',

]);
