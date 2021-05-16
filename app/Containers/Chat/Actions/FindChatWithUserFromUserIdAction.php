<?php

namespace App\Containers\Chat\Actions;

use App\Containers\Chat\Models\ChatUser;
use App\Ship\Parents\Actions\Action;

class FindChatWithUserFromUserIdAction extends Action
{
    public function run($user_id)
    {
        $friendChats = ChatUser::where('user_id', $user_id)
            ->join('chats', 'chats.id', '=', 'chat_users.chat_id')
            ->where('chats.type','dialog')->get();

        $myChats = ChatUser::where('user_id', \Auth::id())->join('chats', 'chats.id', '=', 'chat_users.chat_id')->where('chats.type','dialog')->get();

        $chat = null;

        foreach ($friendChats as $fChat) {
            foreach ($myChats as $mChat) {
                if ($fChat->chat_id === $mChat->chat_id) {
                    $chat = $mChat;
                    break;
                }
            }
        }

        return $chat;
    }
}
