<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\EventSubscriber\DoctrineClassMetadata;

use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\MappingException;
use PhpGuild\DoctrineExtraBundle\Model\Confirmed\ConfirmedInterface;

/**
 * Class ConfirmedMetadataSubscriber
 */
final class ConfirmedMetadataSubscriber implements EventSubscriber
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
            || !is_a($classMetadata->reflClass->getName(), ConfirmedInterface::class, true)
        ) {
            return;
        }

        $classMetadata->mapField([
            'nullable' => true,
            'type' => Types::DATETIME_MUTABLE,
            'fieldName' => ConfirmedInterface::CONFIRMED_AT_FIELD_NAME,
        ]);

        $classMetadata->mapField([
            'nullable' => true,
            'unique' => true,
            'type' => Types::STRING,
            'fieldName' => ConfirmedInterface::CONFIRMED_TOKEN_FIELD_NAME,
        ]);
    }
}
