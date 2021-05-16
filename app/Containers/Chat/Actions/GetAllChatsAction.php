<?php

namespace App\Containers\Chat\Actions;

use App\Containers\Chat\Models\ChatUser;
use App\Ship\Parents\Actions\Action;
use App\Ship\Services\Chat;
use Carbon\Carbon;

class GetAllChatsAction extends Action
{
    public function run()
    {
        $chats = ChatUser::where('user_id', \Auth::id())->with('chat')->get();

        if ($chats->isNotEmpty()) {

            $previews = $chats->map(function($chat) {
                return \Chat::setHash($chat->chat->hash)->getPreview();
            });

            $previews = $previews->sortByDesc(function($item){
                return Carbon::createFromFormat('Y-m-d H:i:s', $item['sort_date'])->getTimestamp();
            });

            return $previews->toArray();
        }

        return [];
    }
}
