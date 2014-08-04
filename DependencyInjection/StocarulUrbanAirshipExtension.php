<?php

namespace Stocarul\UrbanAirshipBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Definition;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class StocarulUrbanAirshipExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('stocarul_urban_airship.app_key', $config['app_key']);
        $container->setParameter('stocarul_urban_airship.app_master_secret', $config['app_master_secret']);

        if (true === isset($config['logger'])) {
            $loggerId = 'stocarul_urban_airship.logger';
            $loggerDefinition = $this->buildLogger($config['logger']);
            $container->setDefinition($loggerId, $loggerDefinition);
        }

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * buildLogger
     *
     * @param array $configuration
     * @return \Symfony\Component\DependencyInjection\Definition
     */
    protected function buildLogger(array $configuration)
    {
        $definition = new Definition('%stocarul_urban_airship.handler.stream.class');

        $definition->setArguments(array(
            $configuration['path'],
            $this->levelToMonologConst($configuration['level']),
        ));

        return $definition;
    }

    /**
     * levelToMonologConst
     *
     * @param int|string $level
     * @return int|constant
     */
    protected function levelToMonologConst($level)
    {
        return is_int($level) ? $level : constant('Monolog\Logger::' . strtoupper($level));
    }
}
