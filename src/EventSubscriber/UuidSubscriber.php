<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Id\IdentityGenerator;
use Doctrine\ORM\Id\UuidGenerator;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Mapping\MappingException;
use PhpGuild\DoctrineExtraBundle\Model\Identity\IdentityInterface;
use PhpGuild\DoctrineExtraBundle\Model\IdInterface;
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

        if (
            true === $classMetadata->isMappedSuperclass
            || null === $classMetadata->reflClass
            || !is_a($classMetadata->reflClass->getName(), IdInterface::class, true)
            || $classMetadata->hasField(IdInterface::ID_FIELD_NAME)
        ) {
            return;
        }

        $type = null;
        $generator = null;
        $generatorType = null;

        if (is_a($classMetadata->reflClass->getName(), UuidInterface::class, true)) {
            $type = Types::GUID;
            $generator = new UuidGenerator();
            $generatorType = ClassMetadataInfo::GENERATOR_TYPE_UUID;

        } elseif (is_a($classMetadata->reflClass->getName(), IdentityInterface::class, true)) {
            $type = Types::INTEGER;
            $generator = new IdentityGenerator();
            $generatorType = ClassMetadataInfo::GENERATOR_TYPE_IDENTITY;
        }

        if (!$type || !$generator || !$generatorType) {
            return;
        }

        $classMetadata->mapField([
            'id' => true,
            'unique' => true,
            'nullable' => false,
            'type' => $type,
            'fieldName' => IdInterface::ID_FIELD_NAME,
            'columnName' => IdInterface::ID_FIELD_NAME,
        ]);

        $classMetadata->setIdGenerator($generator);
        $classMetadata->setIdGeneratorType($generatorType);
    }
}
