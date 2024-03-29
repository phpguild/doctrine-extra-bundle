<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Uuid;

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
    public function getId(): ?string
    {
        return (string) $this->id;
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
        $this->id = (string) $id;

        return $this;
    }
}
