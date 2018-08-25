<?php

namespace jkliru\Sockets;

/**
 * Работа с сокетами
 *
 * Class Socket
 * @package jkliru\Sockets
 */
class Socket
{
    use UsesBasicSocket;

    private $resource;

    public function __construct($domain, $type, $protocol) {
        $this->resource = socket_create($domain, $type, $protocol);

        if ($this->resource === false) {
            throw new \Exception('Socket creation failed: ' . $this->getLastError());
        }

        return $this;
    }

    public function getSocket() {
        return $this->resource;
    }

    /**
     * Calls socket_bind
     *
     * @param $address
     * @param $port
     * @return $this
     * @throws \Exception
     */
    public function bind($address, $port) {
        if (!socket_bind($this->resource, $address, $port)) {
            throw new \Exception('Socket bind failed: ' . $this->getLastError());
        }

        return $this;
    }

    /**
     * Calls socket_listen
     *
     * @return $this
     * @throws \Exception
     */
    public function listen() {
        if (!socket_listen($this->resource, 1)) {
            throw new \Exception('Socket listen failed: ' . $this->getLastError());
        }

        return $this;
    }

    /**
     * Calls socket_set_option
     *
     * @param $level
     * @param $optname
     * @param $optval
     * @return $this
     * @throws \Exception
     */
    public function setOption($level, $optname, $optval) {
        if (!socket_set_option($this->resource, $level, $optname, $optval)) {
            throw new \Exception('Socket set_option failed: ' . $this->getLastError());
        }

        return $this;
    }
}