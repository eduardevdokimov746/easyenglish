<?php

/**
 * @apiGroup           Chat
 * @apiName            createChat
 *
 * @api                {POST} /v1/chats Endpoint title here..
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
$router->post('chats', [
    'as' => 'api_chat_create_chat',
    'uses'  => 'Controller@createChat',
    'middleware' => [
      'auth:api',
    ],
]);
