<?php

namespace Stocarul\UrbanAirshipBundle\Service;

use UrbanAirship\Airship AS Base;
use Monolog\Handler\StreamHandler;
use UrbanAirship\UALog;

/**
 * Class: Airship
 *
 * @see Base
 */
class Airship extends Base
{
    /**
     * logHandlers
     *
     * @var \Monolog\Handler\StreamHandler[]
     */
    protected $logHandlers = array();

    /**
     * Set a stream handler for logging
     * It removes all previews handlers
     *
     * @param \Monolog\Handler\StreamHandler $stream
     */
    public function setStreamHandler(StreamHandler $stream)
    {
        $this->logHandlers = array($stream);
        $this->updateLogHandlers();
    }

    /**
     * Add a stream handler for logging
     *
     * @param StreamHandler $stream
     */
    public function addStreamHandler(StreamHandler $stream)
    {
        $this->logHandlers[] = $stream;
        $this->updateLogHandlers();
    }

    /**
     * getStreamHandler
     *
     * @return \Monolog\Handler\StreamHandler[]
     */
    public function getStreamHandler()
    {
        return $this->logHandlers;
    }

    /**
     * Set the handlers to the library
     *
     */
    protected function updateLogHandlers()
    {
        UALog::setLogHandlers($this->getStreamHandler());
    }
}
