<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Position;

/**
 * Trait PositionMethodsTrait
 */
trait PositionMethodsTrait
{
    /**
     * getPosition
     *
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * setPosition
     *
     * @param int $position
     *
     * @return PositionInterface
     */
    public function setPosition(int $position): PositionInterface
    {
        $this->position = $position;

        return $this;
    }
}