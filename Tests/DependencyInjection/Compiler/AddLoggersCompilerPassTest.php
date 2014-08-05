<?php

namespace Stocarul\UrbanAirshipBundle\Tests\DependencyInjection\Compiler;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Stocarul\UrbanAirshipBundle\DependencyInjection\Compiler\AddLoggersCompilerPass;

/**
 * Class: AddLoggersCompilerPassTest
 *
 * @see \PHPUnit_Framework_TestCase
 */
class AddLoggersCompilerPassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testProcess
     *
     */
    public function testProcess()
    {
        $container = $this->getContainer();

        $service = new Definition('TestClass');
        $service->addTag('stocarul_urban_airship.logger');
        $container->setDefinition('test', $service);

        $service = new Definition('TestClass');
        $service->addTag('stocarul_urban_airship.logger');
        $container->setDefinition('test2', $service);

        $container->getCompilerPassConfig()->setOptimizationPasses(array());
        $container->getCompilerPassConfig()->setRemovingPasses(array());
        $container->addCompilerPass($this->getLoggersCompilerPass());
        $container->compile();

        $service = $container->getDefinition(
            'stocarul_urban_airship.service.airship'
        );

        $calls = $service->getMethodCalls();
        $this->assertCount(2, $calls);

        $this->assertEquals(
            array('addStreamHandler', array(new Reference('test'))),
            $calls[0]
        );

        $this->assertEquals(
            array('addStreamHandler', array(new Reference('test2'))),
            $calls[1]
        );
    }

    /**
     * getContainer
     *
     * @return \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    protected function getContainer()
    {
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../../Resources/config')
        );

        $loader->load('services.yml');

        return $container;
    }

    /**
     * getLoggersCompilerPass
     *
     * @return \Stocarul\UrbanAirshipBundle\DependencyInjection\Compiler\AddLoggersCompilerPass
     */
    protected function getLoggersCompilerPass()
    {
        return new AddLoggersCompilerPass();
    }
}
