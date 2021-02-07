<?php

namespace App\Containers\User\Jobs;

use App\Ship\Parents\Jobs\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Ratchet\ConnectionInterface;
use WebSocket\Client;

/**
 * Class TestJob
 */
 class TestJob extends Job implements ShouldQueue
 {
     use Queueable;

     public $chat;
     public $resourceId;
     public $data;
     public $topic;
     public $msg;

     public function __construct($topic, $msg)
     {
         $this->topic = $topic;
         $this->msg = $msg;

//         $this->chat = $chat;
//         $this->resourceId = $resourceId;
//         $this->data = $data;
     }

     public function handle()
     {
         //$this->chat->send($this->resourceId, $this->data);
         //$this->client->send($this->data);

         $client = new Client("ws://127.0.0.1:5555");

         $data = ['topic' => $this->topic, 'msg' => $this->msg];

         $client->text(json_encode($data));
         $client->close();
     }
 }
