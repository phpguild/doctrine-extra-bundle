<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Doctrine\Filter;

use Doctrine\DBAL\Exception;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;
use PhpGuild\DoctrineExtraBundle\Model\SoftDeletable\SoftDeletableInterface;

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
     *
     * @throws Exception
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        if (!is_a($targetEntity->getReflectionClass()->getName(), SoftDeletableInterface::class, true)) {
            return '';
        }

        $connection = $this->getConnection();
        $platform = $connection->getDatabasePlatform();
        if (!$platform) {
            return '';
        }

        $column = $targetEntity->getColumnName(SoftDeletableInterface::DELETED_AT_FIELD_NAME);

        return $platform->getIsNullExpression(sprintf('%s.%s', $targetTableAlias, $column));
    }
}
