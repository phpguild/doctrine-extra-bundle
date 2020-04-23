<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class PhpGuildDoctrineExtraExtension
 */
class PhpGuildDoctrineExtraExtension extends Extension
{
    /**
     * getAlias
     *
     * @return string
     */
    public function getAlias(): string
    {
        return 'phpguild_doctrine_extra';
    }

    /**
     * @param array $configs
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');
    }
}
