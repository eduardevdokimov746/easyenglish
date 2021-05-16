<?php

namespace App\Containers\Chat\Actions;

use App\Containers\Chat\Models\ChatUser;
use App\Ship\Parents\Actions\Action;

class ChangeUserAvatarAction extends Action
{
    public function run($user_id, $avatar)
    {
        $chats = ChatUser::where('user_id', $user_id)->with('chat')->get();

        $chats->each(function ($chat) use ($avatar) {
            $hash = $chat->chat->hash;

            $chat = \ChatStorage::get($hash);

            if (!is_null($chat)) {
                $myData = \Chat::getMyData($chat);

                $myData['avatar'] = $avatar;

                $newChat = \Chat::setMyData($chat, $myData);

                \ChatStorage::writeByHash($hash, $newChat);
            }
        });
    }
}
