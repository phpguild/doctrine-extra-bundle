<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Uuid;

use PhpGuild\DoctrineExtraBundle\Model\IdInterface;

/**
 * Interface UuidInterface
 */
interface UuidInterface extends IdInterface
{
    /** @var string */
    public const ID_FIELD_TYPE = 'guid';

    /** @var string  */
    public const ID_FIELD_STRATEGY = 'UUID';

    /**
     * getId
     *
     * @return string
     */
    public function getId(): ?string;

    /**
     * setId
     *
     * @param string $id
     *
     * @return UuidInterface|self
     */
    public function setId($id): UuidInterface;
}
