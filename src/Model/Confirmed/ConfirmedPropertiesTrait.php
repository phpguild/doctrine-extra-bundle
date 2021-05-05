<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Confirmed;

/**
 * Trait ConfirmedPropertiesTrait
 */
trait ConfirmedPropertiesTrait
{
    /** @var ?\DateTime $confirmedAt */
    protected $confirmedAt = null;

    /** @var string|null $confirmedToken */
    protected $confirmedToken = null;
}
