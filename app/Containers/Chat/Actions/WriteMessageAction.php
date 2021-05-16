<?php

namespace App\Containers\Chat\Actions;

use App\Ship\Parents\Actions\Action;

class WriteMessageAction extends Action
{
    public function run($hash, $message)
    {
        $message = \ChatMessage::add($hash, $message);

        $message['time'] = \ChatMessage::getTime($message['date_time']);

        return $message;
    }
}
