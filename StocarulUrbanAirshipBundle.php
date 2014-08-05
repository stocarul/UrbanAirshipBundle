<?php

namespace Stocarul\UrbanAirshipBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Stocarul\UrbanAirshipBundle\DependencyInjection\Compiler\AddLoggersCompilerPass;

/**
 * Class: StocarulUrbanAirshipBundle
 *
 * @see Bundle
 */
class StocarulUrbanAirshipBundle extends Bundle
{
    /**
     * build
     *
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AddLoggersCompilerPass);
    }
}
