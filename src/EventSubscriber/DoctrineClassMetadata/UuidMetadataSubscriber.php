<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\EventSubscriber\DoctrineClassMetadata;

use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Id\IdentityGenerator;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Mapping\MappingException;
use PhpGuild\DoctrineExtraBundle\Model\Identity\IdentityInterface;
use PhpGuild\DoctrineExtraBundle\Model\IdInterface;
use PhpGuild\DoctrineExtraBundle\Model\Uuid\UuidInterface;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;

/**
 * Class UuidMetadataSubscriber
 */
final class UuidMetadataSubscriber implements EventSubscriber
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
            $type = 'uuid';
            $generator = UuidGenerator::class;
            $generatorType = ClassMetadataInfo::GENERATOR_TYPE_CUSTOM;

        } elseif (is_a($classMetadata->reflClass->getName(), IdentityInterface::class, true)) {
            $type = Types::INTEGER;
            $generator = new IdentityGenerator();
            $generatorType = ClassMetadataInfo::GENERATOR_TYPE_IDENTITY;
        }

        if (!$type || !$generator || !$generatorType) {
            return;
        }

        $classMetadata->setIdGenerator(new $generator());
        $classMetadata->setIdGeneratorType($generatorType);

        $classMetadata->mapField([
            'id' => true,
            'unique' => true,
            'nullable' => false,
            'type' => $type,
            'fieldName' => IdInterface::ID_FIELD_NAME,
        ]);

        if ($generatorType === ClassMetadataInfo::GENERATOR_TYPE_CUSTOM) {
            $classMetadata->setCustomGeneratorDefinition(['class' => $generator]);
        }
    }
}
