<?php

namespace jkliru\Sockets;

/**
 * Базовые операции с сокетами
 *
 * Class UsesBasicSocket
 * @package jkliru\Sockets
 */
trait UsesBasicSocket {
    /**
     * Calls socket_write
     *
     * @param $message
     * @throws \Exception
     */
    public function write($message) {
        $write = socket_write($this->resource, $message, strlen($message));

        if ($write === false) {
            throw new \Exception('Socket write failed: ' . $this->getLastError());
        }
    }

    /**
     * Calls socket_read
     *
     * @return string
     * @throws \Exception
     */
    public function read() {
        $read = socket_read($this->resource, 2048);

        if ($read === false) {
            throw new \Exception('Socket read failed: ' . $this->getLastError());
        }

        return $read;
    }

    /**
     * Calls socket_close
     */
    public function close() {
        socket_close($this->resource);
    }

    /**
     * Retrieves last socket error
     *
     * @return string
     */
    private function getLastError() {
        return socket_strerror(socket_last_error());
    }
}