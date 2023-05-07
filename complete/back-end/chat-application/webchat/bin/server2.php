<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Chat;
use Ratchet\Session\SessionProvider;
use Ratchet\Session\Storage\Handler\NullSessionHandler;
use Ratchet\Session\Storage\PhpSessionStorage;
use Your\Namespace\RatchetSessionHandler;

require dirname(__DIR__) . '/vendor/autoload.php';

$sessionProvider = new SessionProvider(
    new Chat(),
    new PhpSessionStorage(
        new RatchetSessionHandler()
    )
);

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            $sessionProvider
        )
    ),
    8080
);

$server->run();
