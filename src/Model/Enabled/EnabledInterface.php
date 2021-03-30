<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Enabled;

use PhpGuild\DoctrineExtraBundle\Model\IdInterface;

/**
 * Interface EnabledInterface
 */
interface EnabledInterface extends IdInterface
{
    /** @var string */
    public const ENABLED_COLUMN_NAME = 'enabled';

    /**
     * isEnabled
     *
     * @return bool
     */
    public function isEnabled(): bool;

    /**
     * setEnabled
     *
     * @param bool $enabled
     *
     * @return EnabledInterface
     */
    public function setEnabled(bool $enabled): EnabledInterface;
}
