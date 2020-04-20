<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Identity;

use PhpGuild\DoctrineExtraBundle\Model\IdInterface;

/**
 * Interface IdentityInterface
 */
interface IdentityInterface extends IdInterface
{
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
     * @return IdentityInterface|self
     */
    public function setId($id): IdentityInterface;
}
