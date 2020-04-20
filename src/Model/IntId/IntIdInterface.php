<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\IntId;

use PhpGuild\DoctrineExtraBundle\Model\IdInterface;

/**
 * Interface IntIdInterface
 */
interface IntIdInterface extends IdInterface
{
    /** @var string */
    public const ID_FIELD_TYPE = 'integer';

    /** @var string  */
    public const ID_FIELD_STRATEGY = 'AUTO';

    /**
     * getId
     *
     * @return int
     */
    public function getId(): ?int;

    /**
     * setId
     *
     * @param int $id
     *
     * @return IntIdInterface|self
     */
    public function setId($id): IntIdInterface;
}
