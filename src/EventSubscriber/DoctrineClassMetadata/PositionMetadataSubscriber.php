<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\EventSubscriber\DoctrineClassMetadata;

use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Mapping\MappingException;
use PhpGuild\DoctrineExtraBundle\Model\Position\PositionInterface;

/**
 * Class PositionMetadataSubscriber.
 */
final class PositionMetadataSubscriber implements EventSubscriber
{
    /**
     * getSubscribedEvents
     *
     * @return string[]
     */
    public function getSubscribedEvents(): array
    {
        return [ Events::loadClassMetadata ];
    }

    /**
     * loadClassMetadata
     *
     * @param LoadClassMetadataEventArgs $loadClassMetadataEventArgs
     *
     * @throws MappingException
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $loadClassMetadataEventArgs): void
    {
        $classMetadata = $loadClassMetadataEventArgs->getClassMetadata();

        if (
            true === $classMetadata->isMappedSuperclass
            || null === $classMetadata->reflClass
            || !is_a($classMetadata->reflClass->getName(), PositionInterface::class, true)
        ) {
            return;
        }

        $classMetadata->mapField([
            'nullable' => false,
            'unique' => false,
            'type' => Types::INTEGER,
            'fieldName' => PositionInterface::POSITION_FIELD_NAME,
        ]);
    }
}
