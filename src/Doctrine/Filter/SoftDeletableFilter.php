<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Doctrine\Filter;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;
use Knp\DoctrineBehaviors\Contract\Entity\SoftDeletableInterface;

/**
 * Class SoftDeletableFilter.
 */
class SoftDeletableFilter extends SQLFilter
{
    /**
     * addFilterConstraint
     *
     * @param ClassMetadata $targetEntity
     * @param string        $targetTableAlias
     *
     * @return string
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        if (!is_a($targetEntity->getReflectionClass()->getName(), SoftDeletableInterface::class, true)) {
            return '';
        }

        return sprintf('%s.deleted_at IS NULL', $targetTableAlias);
    }
}
