<?php

namespace Evrinoma\SettingsBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Evrinoma\SettingsBundle\DependencyInjection\EvrinomaSettingsBundleExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class EvrinomaSettingsBundle
 *
 * @package Evrinoma\SettingsBundle
 */
class EvrinomaSettingsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';
        if (class_exists($ormCompilerClass)) {
            $container->addCompilerPass(
                DoctrineOrmMappingsPass::createAnnotationMappingDriver(
                    ['Evrinoma\SettingsBundle\Entity'],
                    [sprintf('%s/Entity', $this->getPath())]
                )
            );
        }
    }

    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new EvrinomaSettingsBundleExtension();
        }
        return $this->extension;
    }
}