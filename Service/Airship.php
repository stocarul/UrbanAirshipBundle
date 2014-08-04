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
    protected $logHandlers;

    /**
     * Set a stream handler for logging
     * It removes all previews handlers
     *
     * @param \Monolog\Handler\StreamHandler $stream
     */
    public function setStreamHandler(StreamHandler $stream)
    {
        $logHandlers = array($stream);
        $this->updateLogHandlers();
    }

    /**
     * Add a stream handler for logging
     *
     * @param StreamHandler $stream
     */
    public function addStreamHandler(StreamHandler $stream)
    {
        $logHandlers[] = $stream;
        $this->updateLogHandlers();
    }

    /**
     * Set the handlers to the library
     *
     */
    protected function updateLogHandlers()
    {
        UALog::setLogHandlers($this->logHandlers);
    }
}
