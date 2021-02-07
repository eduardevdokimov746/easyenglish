<?php

namespace App\Ship\Parents\Socket;

use App\Containers\User\Jobs\TestJob;
use App\Containers\User\Models\User;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Base implements MessageComponentInterface {

    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $data = json_decode($msg, 1);

        if(isset($data['setTopic'])){

            $this->clients->offsetSet($from, ['topic' => $data['setTopic']]);
            return;
        }

        foreach ($this->clients as $client) {

            if ($this->clients[$client]['topic'] == $data['topic']) {
                // The sender is not the receiver, send to each client connected

                //dispatch(new TestJob($this, $client->resourceId, $msg))->onQueue('messages');



                $client->send($data['msg']);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    public function send($resource_id, $msg)
    {
        $this->clients[$resource_id]->send($msg);
    }
}
