<?php

namespace App\Ship\Services;

use Carbon\Carbon;

class Chat
{
    protected $hash = null;

    public function setMyData($chat, $data)
    {
        $chat['users'] = collect($chat['users'])->map(function($user) use ($data) {
            if($user['id'] === \Auth::id()){
                return $data;
            } else {
                return $user;
            }
        })->toArray();

        return $chat;
    }

    public function getMyData($chat)
    {
        return collect($chat['users'])->filter(function($user){
            return $user['id'] === \Auth::id();
        })->first();
    }

    public function checkedMessages()
    {
        if ($this->hashIsNull()) {
            return;
        }

        $chat = \ChatStorage::get($this->hash);

        $messages = $chat['msgs'];

        if (!empty($messages)) {
            foreach ($messages as $key => $msg) {
                if ($msg['user_id'] != \Auth::id()) {
                    $msg['is_checked'] = 1;
                    $messages[$key] = $msg;
                }
            }
            $chat['msgs'] = $messages;
        }

        \ChatStorage::writeByHash($this->hash, $chat);
    }

    public function getTopic()
    {
        if ($this->hashIsNull()) {
            return null;
        }

        $chat = \ChatStorage::get($this->hash);

        if ($chat['data']['type'] == 'dialog') {
            return $this->getFriend($chat)['id'];
        } else {
            return $this->hash;
        }
    }

    public function createDialog($user)
    {
        $data = [
            'users' => [
                [
                    'id' => \Auth::id(),
                    'name' => \Auth::user()->fio ?: \Auth::user()->login,
                    'avatar' => \Auth::user()->avatar,
                ],
                [
                    'id' => $user->id,
                    'name' => $user->fio ?: $user->login,
                    'avatar' => $user->avatar,
                ]
            ],
            'data' => [
                'type' => 'dialog',
                'title' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            'msgs' => []
        ];

        return \ChatStorage::create(json_encode($data));
    }

    public function getDialog()
    {
        if ($this->hashIsNull()) {
            return null;
        }

        $chat = \ChatStorage::get($this->hash);

        $messages = $chat['msgs'];

        foreach ($messages as $key => $msg) {
            $msg['time'] = \ChatMessage::getTime($msg['date_time']);
            $messages[$key] = $msg;
        }

        $chat['msgs'] = $messages;

        return $chat;
    }

    public function createDataBoxes($messages)
    {
        $dataBoxes = [];

        foreach ($messages as $key => $msg) {
            if (isset($messages[$key + 1])) {
                if (!is_null($dataBox = \ChatMessage::getDataBox($messages[$key], $messages[$key + 1]))) {
                    $dataBoxes[$messages[$key]['id']] = $dataBox;
                }
            }
        }

        return $dataBoxes;
    }

    public function getPreview()
    {
        if ($this->hashIsNull()) {
            return null;
        }

        if (!is_null($chat = \ChatStorage::get($this->hash))) {
            if ($chat['data']['type'] == 'dialog') {
                $preview = $this->createPreviewForDialog($chat);
                return $preview;
            }
        }

        return null;
    }

    protected function createPreviewForDialog($chat)
    {
        $friend = $this->getFriend($chat);
        $lastMsg = $this->getLastMsg($chat);

        $preview['hash'] = $this->hash;
        $preview['title'] = $friend['name'];

        if ($friend['avatar'] == 'no_image_user.png') {
            $preview['is_default_avatar'] = 1;
        } else {
            $preview['is_default_avatar'] = 0;
            $preview['img'] = \PhotoStorage::getProfileAvatarForImage($friend['avatar']);
        }

        $preview['type'] = 'dialog';

        if (!is_null($lastMsg)) {
            if ($lastMsg['user_id'] == \Auth::id()) {
                $preview['last_msg']['sender'] = 'my';
                $preview['isset_new_msg'] = 0;

            } else {
                $preview['last_msg']['sender'] = 'friend';

                $preview['isset_new_msg'] = $this->getCountNewMsgs($chat) > 0;

                if ($preview['isset_new_msg']) {
                    $preview['new_msg_count'] = $this->getCountNewMsgs($chat);
                }
            }

            $preview['last_msg']['date_time'] = $lastMsg['date_time'];

            if ($lastMsg['type'] == 'file') {
                $preview['last_msg']['msg'] = 'Файл';
            } else {
                $preview['last_msg']['msg'] = $lastMsg['content'];
            }
        }

        $preview['created_at'] = $chat['data']['created_at'];
        $preview['sort_date'] = !is_null($lastMsg) ? $lastMsg['date_time'] : $preview['created_at'];

        return $preview;
    }

    protected function getCountNewMsgs($chat)
    {
        $msgs = collect($chat['msgs'])->reverse();

        $firstCheckedMsg = $msgs->search(function($msg){
            return $msg['is_checked'] == 1;
        });

        if ($firstCheckedMsg === false) {
            return $msgs->count();
        } else {
            $count = 0;

            foreach ($msgs as $msg) {
                if ($msg['is_checked'] == 0 && $msg['user_id'] != \Auth::id()) {
                    $count++;
                } else {
                    break;
                }
            }

            return $count;
        }
    }

    protected function getFriend($chat)
    {
        return collect($chat['users'])->filter(function($user){
            return $user['id'] !== \Auth::id();
        })->first();
    }

    protected function getLastMsg($chat)
    {
        return collect($chat['msgs'])->last();
    }

    protected function hashIsNull(): bool
    {
        return is_null($this->hash);
    }

    public function setHash($hash): self
    {
        $this->hash = $hash;
        return $this;
    }
}
