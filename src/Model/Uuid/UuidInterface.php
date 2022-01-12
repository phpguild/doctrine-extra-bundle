<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Uuid;

use PhpGuild\DoctrineExtraBundle\Model\IdInterface;
use Symfony\Component\Uid\Uuid;

/**
 * Interface UuidInterface
 */
interface UuidInterface extends IdInterface
{
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
