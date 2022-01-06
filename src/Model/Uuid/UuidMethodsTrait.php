<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Uuid;

use Symfony\Component\Uid\Uuid;

/**
 * Trait UuidMethodsTrait
 */
trait UuidMethodsTrait
{
    /**
     * getId
     *
     * @return string
     */
    public function getId(): ?Uuid
    {
        return $this->id;
    }

    /**
     * setId
     *
     * @param string $id
     *
     * @return UuidInterface|self
     */
    public function setId($id): UuidInterface
    {
        $this->id = $id;

        return $this;
    }
}
