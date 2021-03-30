<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Enabled;

/**
 * Trait EnabledMethodsTrait
 */
trait EnabledMethodsTrait
{
    /**
     * isEnabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * setEnabled
     *
     * @param bool $enabled
     *
     * @return EnabledInterface|self
     */
    public function setEnabled(bool $enabled): EnabledInterface
    {
        $this->enabled = $enabled;

        return $this;
    }
}
