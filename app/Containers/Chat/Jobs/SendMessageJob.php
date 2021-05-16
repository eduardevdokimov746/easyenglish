<?php

namespace App\Containers\Chat\Jobs;

use App\Ship\Parents\Jobs\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use WebSocket\Client;

class SendMessageJob extends Job implements ShouldQueue
{
    use Queueable;

    public $topic;
    public $hash;
    public $msg;

    public function __construct($topic, $hash, $msg)
    {
        $this->topic = $topic;
        $this->hash = $hash;
        $this->msg = $msg;
    }

    public function handle()
    {
        $client = new Client("ws://easyenglish.ddns.net:5555");

        $data = [
            'topic' => $this->topic,
            'msg' => [
                'hash' => $this->hash,
                'content' => $this->msg,
                'type' => 'simple'
            ]
        ];

        $client->text(json_encode($data));
        $client->close();
    }
}
