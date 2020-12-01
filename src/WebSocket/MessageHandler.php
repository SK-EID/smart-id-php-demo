<?php


namespace App\WebSocket;


use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use SplObjectStorage;

class MessageHandler implements MessageComponentInterface
{

    protected $connections;

    public function __construct()
    {
        $this->connections = new SplObjectStorage;
    }

    function onOpen(ConnectionInterface $conn)
    {
        $this->connections->attach($conn);
    }

    function onClose(ConnectionInterface $conn)
    {
        $this->connections->detach($conn);
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        $this->connections->detach($conn);
        $conn->close();
    }

    public function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        foreach($this->connections as $connection)
        {
            if($connection === $conn)
            {
                continue;
            }
            $connection->send($msg);
        }
    }
}