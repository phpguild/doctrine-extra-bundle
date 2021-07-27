<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Position;

/**
 * Interface PositionInterface.
 */
interface PositionInterface
{
    public const POSITION_FIELD_NAME = 'position';

    /**
     * getPosition
     *
     * @return int
     */
    public function getPosition(): int;

    /**
     * setPosition
     *
     * @param int $position
     *
     * @return PositionInterface|self
     */
    public function setPosition(int $position): PositionInterface;
}
