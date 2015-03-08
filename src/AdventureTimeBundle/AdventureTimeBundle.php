<?php

namespace AdventureTimeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use AdventureTimeBundle\DependencyInjection\Security\Factory\WsseFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AdventureTimeBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new WsseFactory());
    }
}
