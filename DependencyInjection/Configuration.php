<?php

namespace Stocarul\UrbanAirshipBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('stocarul_urban_airship');

        $rootNode
            ->children()
                ->scalarNode('app_key')->isRequired()->end()
                ->scalarNode('app_master_secret')->isRequired()->end()
                ->arrayNode('logger')
                    ->children()
                        ->scalarNode('path')->isRequired()->end()
                        ->scalarNode('level')->defaultValue('DEBUG')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
