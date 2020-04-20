<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Identity;

/**
 * Trait IdentityMethodsTrait
 */
trait IdentityMethodsTrait
{
    /**
     * getId
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * setId
     *
     * @param int $id
     *
     * @return IdentityInterface|self
     */
    public function setId($id): IdentityInterface
    {
        $this->id = $id;

        return $this;
    }
}
