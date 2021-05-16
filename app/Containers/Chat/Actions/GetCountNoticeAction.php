<?php

namespace App\Containers\Chat\Actions;

use App\Ship\Parents\Actions\Action;

class GetCountNoticeAction extends Action
{
    public function run()
    {
        $chats = \Apiato::call('Chat@GetAllChatsAction');

        $count = 0;

        foreach($chats as $chat){
            if(isset($chat['isset_new_msg']) && $chat['isset_new_msg'] == 1){
                $count += $chat['new_msg_count'];
            }
        }

        return $count;
    }
}
