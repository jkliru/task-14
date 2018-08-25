<?php

namespace jkliru\Sockets;

/**
 * Соединение клиента
 *
 * Class ClientConnection
 * @package jkliru\Sockets
 */
class ClientConnection
{
    private $connect;

    public function __construct($socket, $address, $port) {
        $this->connect = socket_connect($socket, $address, $port);
        if ($this->connect === false) {
            die('Connect creation failed: ' . socket_strerror(socket_last_error()));
        }
    }

    public function getConnection() {
        return $this->connect;
    }
}