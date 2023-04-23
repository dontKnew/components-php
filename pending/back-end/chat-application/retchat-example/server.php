<?php
require __DIR__ . '/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class Chat implements MessageComponentInterface {
    protected $clients;
    protected $userOnline = [];

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg);
        if (!empty($data->action) && $data->action == 'login') {
            $this->userOnline[$data->username] = $from->resourceId;
            return;
        }

        if (!empty($data->to) && !empty($this->userOnline[$data->to])) {
            $target = $this->userOnline[$data->to];
            foreach ($this->clients as $client) {
                if ($client->resourceId == $target) {
                    $client->send($msg);
                    break;
                }
            }
        } else {
            // Return an error message to the sender
            $from->send(json_encode([
                'action' => 'error',
                'message' => 'User is offline'
            ]));
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    5555
);

// Set up a periodic timer to send heartbeats to clients
$server->loop->addPeriodicTimer(10, function() use ($server) {
    foreach ($server->getConnections() as $conn) {
        $conn->send(json_encode([
            'action' => 'heartbeat'
        ]));
    }
});

$server->run();
