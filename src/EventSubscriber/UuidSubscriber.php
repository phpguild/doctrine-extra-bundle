<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\MappingException;
use PhpGuild\DoctrineExtraBundle\Model\IdInterface;
use PhpGuild\DoctrineExtraBundle\Model\IntId\IntIdInterface;
use PhpGuild\DoctrineExtraBundle\Model\Uuid\UuidInterface;

/**
 * Class UuidSubscriber
 */
final class UuidSubscriber implements EventSubscriber
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

        if (true === $classMetadata->isMappedSuperclass) {
            return;
        }

        if (
            true === $classMetadata->isMappedSuperclass
            || null === $classMetadata->reflClass
            || !is_a($classMetadata->reflClass->getName(), IdInterface::class, true)
            || $classMetadata->hasField(IdInterface::ID_FIELD_NAME)
        ) {
            return;
        }

        $type = IntIdInterface::ID_FIELD_TYPE;
        $strategy = IntIdInterface::ID_FIELD_STRATEGY;

        if (is_a($classMetadata->reflClass->getName(), UuidInterface::class, true)) {
            $type = UuidInterface::ID_FIELD_TYPE;
            $strategy = UuidInterface::ID_FIELD_STRATEGY;
        }

        $classMetadata->mapField([
            'id' => true,
            'fieldName' => IdInterface::ID_FIELD_NAME,
            'type' => $type,
            'generator' => [
                'strategy' => $strategy,
            ],
        ]);
    }
}
