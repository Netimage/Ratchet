<?php
namespace Ratchet\Server;
use Ratchet\ConnectionInterface;
use React\Socket\ConnectionInterface as ReactConn;

/**
 * {@inheritdoc}
 *
 * Components attach per-connection data (resourceId, remoteAddress, httpRequest, Session, ...) as properties, and every
 * decorator passes them through to this, the innermost connection. So properties are dynamic by design here.
 */
#[\AllowDynamicProperties]
class IoConnection implements ConnectionInterface {
    /**
     * @var \React\Socket\ConnectionInterface
     */
    protected $conn;


    /**
     * @param \React\Socket\ConnectionInterface $conn
     */
    public function __construct(ReactConn $conn) {
        $this->conn = $conn;
    }

    /**
     * {@inheritdoc}
     */
    public function send($data) {
        $this->conn->write($data);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function close() {
        $this->conn->end();
    }
}
