<?php

namespace App\Ship\Parents\Socket;

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class Chat
{
    public function run()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Base()
                )
            ),
            5555
        );

        $server->run();
    }
}
