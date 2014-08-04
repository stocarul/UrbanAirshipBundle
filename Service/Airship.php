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
     * Set a stream handler for logging
     *
     * @param \Monolog\Handler\StreamHandler $stream
     */
    public function setStreamHandler(StreamHandler $stream)
    {
        UALog::setLogHandlers(array($stream));
    }
}
