<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\IntId;

/**
 * Trait IntIdMethodsTrait
 */
trait IntIdMethodsTrait
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
     * @return IntIdInterface|self
     */
    public function setId($id): IntIdInterface
    {
        $this->id = $id;

        return $this;
    }
}
