<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\SoftDeletable;

/**
 * Interface SoftDeletableInterface.
 */
interface SoftDeletableInterface extends \Knp\DoctrineBehaviors\Contract\Entity\SoftDeletableInterface
{
    public const DELETED_AT_FIELD_NAME = 'deletedAt';
}
