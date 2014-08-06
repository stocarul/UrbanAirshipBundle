<?php

namespace Stocarul\UrbanAirshipBundle\Tests\Service;

use Stocarul\UrbanAirshipBundle\Service\Airship;

/**
 * Class: AirshipTest
 *
 * @see \PHPUnit_Framework_TestCase
 */
class AirshipTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testSetStreamHandler
     *
     */
    public function testSetStreamHandler()
    {
        $service = $this->getAirshipService();
        $stream = $this->getStreamHandler();

        $service->setStreamHandler($stream);
        $this->assertEquals(array($stream), $service->getStreamHandler());
    }

    /**
     * testAddStreamHandler
     *
     */
    public function testAddStreamHandler()
    {
        $service = $this->getAirshipService();
        $stream = $this->getStreamHandler();

        $service->addStreamHandler($stream);
        $service->addStreamHandler($stream);

        $this->assertCount(2, $service->getStreamHandler());
    }

    /**
     * getAirshipService
     *
     * @return Airship
     */
    protected function getAirshipService()
    {
        return new Airship('APP_KEY', 'APP_MASTER_SECRET');
    }

    /**
     * getStreamHandler
     *
     * @return \Monolog\Handler\StreamHandler
     */
    protected function getStreamHandler()
    {
        return $this
            ->getMockBuilder('\Monolog\Handler\StreamHandler')
            ->setMethods(array())
            ->disableOriginalConstructor()
            ->getMock();
    }
}
