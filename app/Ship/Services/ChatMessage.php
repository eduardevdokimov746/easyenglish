<?php

namespace App\Ship\Services;

use Carbon\Carbon;

class ChatMessage
{
    public function getTime($dateTime)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('H:i');
    }

    public function getDataBox($prev_msg, $next_msg)
    {
        $prev_msg_date = Carbon::createFromFormat('Y-m-d H:i:s', $prev_msg['date_time'])->format('Y-m-d');
        $nex_msg_date = Carbon::createFromFormat('Y-m-d H:i:s', $next_msg['date_time'])->format('Y-m-d');

        if ($prev_msg_date !== $nex_msg_date) {
            return ['message_id' => $prev_msg['id'], 'date' => Carbon::createFromFormat('Y-m-d H:i:s', $next_msg['date_time'])->isoFormat('DD MMMM YYYY')];
        }

        return null;
    }

    public function add($hash, $message)
    {
        $chat = \ChatStorage::get($hash);
        $lastMessageId = $this->getIdLastMessage($chat);
//        var_dump($chat);
//        die;
        $message['id'] = is_null($lastMessageId) ? 1 : $lastMessageId + 1;
        $message['date_time'] = Carbon::now()->format('Y-m-d H:i:s');
        $message['is_checked'] = 0;

        if (is_null($chat['msgs']) || empty($chat['msgs'])) {
            $chat['msgs'] = [$message];
        } else {
            array_push($chat['msgs'], $message);
        }

        \ChatStorage::writeByHash($hash, $chat);

        return $message;
    }

    public function getLastMessage($chat)
    {
        if (empty($chat['msgs'])) {
            return null;
        }

        return $chat['msgs'][count($chat['msgs']) - 1];
    }

    public function getIdLastMessage($chat)
    {
        if (is_null($message = $this->getLastMessage($chat))) {
            return null;
        }

        return $message['id'];
    }
}
