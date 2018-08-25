<?php

namespace jkliru\Sockets;

/**
 * Соединение сервера
 *
 * Class ServerConnection
 * @package jkliru\Sockets
 */
class ServerConnection
{
    use UsesBasicSocket;

    private $resource;

    public function __construct($socket) {
        $this->resource = socket_accept($socket);
        if ($this->resource === false) {
            die('Connect creation failed: ' . socket_strerror(socket_last_error()));
        }
    }

    public function getConnection() {
        return $this->resource;
    }
}