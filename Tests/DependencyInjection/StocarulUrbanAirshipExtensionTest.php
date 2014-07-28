<?php

namespace Stocarul\UrbanAirshipBundle\Tests\DependencyInjection;

use Stocarul\UrbanAirshipBundle\DependencyInjection\StocarulUrbanAirshipExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class: StocarulUrbanAirshipExtensionTest
 *
 * @see \PHPUnit_Framework_TestCase
 */
class StocarulUrbanAirshipExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testLoadThrowsExceptionIfEmpty
     *
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionIfEmpty()
    {
        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();
        $extension->load(array(), $container);
    }

    /**
     * testLoadThrowsExceptionIfAppKeyNotSet
     *
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionIfAppKeyNotSet()
    {
        $configs = array(
            'stocarul_urban_airship' => array(
                'app_master_secret' => 'test_app_master_secret',
            ),
        );

        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();
        $extension->load($configs, $container);
    }

    /**
     * testLoadThrowsExceptionIfAppSecretNotSet
     *
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionIfAppSecretNotSet()
    {
        $configs = array(
            'stocarul_urban_airship' => array(
                'app_key' => 'test_app_key',
            ),
        );

        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();
        $extension->load($configs, $container);
    }

    /**
     * testLoadPass
     *
     */
    public function testLoadPass()
    {
        $configs = array(
            'stocarul_urban_airship' => array(
                'app_key' => 'test_app_key',
                'app_master_secret' => 'test_app_master_secret',
            ),
        );

        $container = $this->getContainerBuilder();
        $extension = $this->getExtension();

        $extension->load($configs, $container);
    }

    /**
     * getContainerBuilder
     *
     * @return \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    protected function getContainerBuilder()
    {
        return new ContainerBuilder();
    }

    /**
     * getExtension
     *
     * @return \Stocarul\UrbanAirshipBundle\DependencyInjection\StocarulUrbanAirshipExtension
     */
    protected function getExtension()
    {
        return new StocarulUrbanAirshipExtension();
    }
}
