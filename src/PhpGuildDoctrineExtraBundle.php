<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle;

use PhpGuild\DoctrineExtraBundle\DependencyInjection\PhpGuildDoctrineExtraExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class PhpGuildDoctrineExtraBundle
 */
class PhpGuildDoctrineExtraBundle extends Bundle
{
    /**
     * getContainerExtension
     *
     * @return ExtensionInterface
     */
    public function getContainerExtension(): ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new PhpGuildDoctrineExtraExtension();
        }

        return $this->extension;
    }
}

