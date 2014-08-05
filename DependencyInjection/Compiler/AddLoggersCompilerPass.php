<?php

namespace Stocarul\UrbanAirshipBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class: AddLoggersCompilerPass
 *
 * @see CompilerPassInterface
 */
class AddLoggersCompilerPass implements CompilerPassInterface
{
    /**
     * process
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('stocarul_urban_airship.service.airship')) {
            return;
        }

        $definition = $container->getDefinition(
            'stocarul_urban_airship.service.airship'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'stocarul_urban_airship.logger'
        );

        foreach ($taggedServices as $id => $attributes){
            $definition->addMethodCall(
                'addStreamHandler',
                array(new Reference($id))
            );
        }
    }
}
